<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Schedule\Status;
use App\Models\Agendamento\Guia;
use Redirect, Auth;

class ScheduleController extends Controller
{
    protected $rules = [
        'pessoa_id'          => 'required',
        'notas'    => 'max:155',
        'status'         => 'numeric',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Schedule::where('empresa_id', \Auth::user()->empresa_id)->orderByDesc('id')->get();
        $status = Status::all();

        $tasksInComplete = $tasks->filter(function($task) {
            return $task->status_id == 1 || $task->status_id == 2;
        });

        $tasksComplete = $tasks->filter(function($task) {
            return $task->status_id == 3;
        });

        $tasksCancelados = $tasks->filter(function($task) {
            return $task->status_id == 4;
        });

        return view('schedule.index', compact('tasks', 'tasksInComplete', 'tasksComplete', 'status', 'tasksCancelados'));
    }

    public function agendamentos(Request $request)
    {
        $data = $request->request->all();

        $user = \Auth::user();

        $empresa = $user->empresa_id;

        $inicio = new \DateTime($data['start']);
        $fim = new \DateTime($data['end']);

        $agendamentos = Schedule::where('empresa_id', $empresa);

        if($request->has('guia_id')) {
            $agendamentos->where('guia_id', $request->get('guia_id'));
        }

        $agendamentos = $agendamentos->where('inicio', '>=', $inicio)->where('fim', '<=', $fim)->get();

        $cardCollor = "#008080";
        $editable = true;

        $agenda = $agendamentos->map(function($agenda) use ($cardCollor, $editable) {

            switch($agenda->status_id) {
              case 2:
                $cardCollor = "#3498DB";
              break;
              case 3:
                $cardCollor = "#CD5C5C";
                $editable = false;
              break;
              case 4:
                $cardCollor = "#FA8072";
                $editable = false;
              break;
            }

            return [
                'id' => $agenda->id,
                'pessoaId' => $agenda->pessoa->id,
                'pessoa' => $agenda->pessoa->nome,
                'status' => $agenda->confirmada,
                'status_id' => $agenda->status_id,
                'title' => $agenda->pessoa->nome,
                'start' => $agenda->inicio->format('Y-m-d H:i'),
                'end' => $agenda->fim->format('Y-m-d H:i'),
                'color'  => $cardCollor,
                'editable' => $editable,
                'notas' => $agenda->notas,
                'selectable' => $editable,
                'droppable' => $editable
            ];
        });

        return $agenda->toJson();
    }

    public function iniciarAgendamento(Request $request, $id)
    {
          $data = $request->request->all();

          $agenda = Schedule::uuid($id);
          $agenda->status_id = 2;
          $agenda->save();

          return redirect()->back()->with('success', 'Agendamento iniciado com sucesso!');
    }

    public function finalizarAgendamento(Request $request, $id)
    {
          $data = $request->request->all();

          $agenda = Schedule::uuid($id);
          $agenda->status_id = 3;
          $agenda->save();

          return redirect()->back()->with('success', 'Agendamento finalizado com sucesso!');
    }

    public function cancelarAgendamento(Request $request, $id)
    {
          $data = $request->request->all();

          $agenda = Schedule::uuid($id);
          $agenda->status_id = 4;
          $agenda->save();

          return redirect()->back()->with('success', 'Agendamento cancelado com sucesso!');
    }

    public function updateData(Request $request)
    {
      try {

        $data = $request->request->all();

        $validator = \Illuminate\Support\Facades\Validator::make($data, [
          'inicio' => 'required',
          'fim' => 'required',
          /*'status' => 'required',*/
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json(
                [
                    'code' => 501,
                    'message' => $errors->all(),
                ]
            );
        }

        $agenda = Schedule::findOrFail($data['id']);
        $agenda->inicio = \DateTime::createFromFormat('d/m/Y H:i', $data['inicio']);
        $agenda->fim = \DateTime::createFromFormat('d/m/Y H:i', $data['fim']);
        //$agenda->confirmada = $data['status'];
        $agenda->pessoa_id = $data['pessoa'];
        $agenda->notas = $data['notas'];
        $agenda->save();

        return response()->json(
            [
                'code' => 201,
                'message' => 'Consulta reagendada com sucesso.',
            ]
        );

      } catch(Exception $e) {

        return response()->json(
            [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ]
        );

      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->request->all();

        $guia = null;

        if($request->has('guia_id')) {
            $guia = Guia::findOrFail($request->get('guia_id'));
        }

        return view('schedule.create', compact('guia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->request->all();

        $this->validate($request, $this->rules);

        $data['inicio'] = \DateTime::createFromFormat('d/m/Y H:i', $data['inicio']);
        $data['fim'] = \DateTime::createFromFormat('d/m/Y H:i', $data['fim']);
        $data['user_id'] = \Auth::user()->id;
        $data['empresa_id'] = \Auth::user()->empresa_id;
        $data['status_id'] = 1;
        $schedule = Schedule::create($data);

        if($request->has('guia_id')) {
            $guia = Guia::findOrFail($request->get('guia_id'));
            return redirect()->route('guias.edit', $guia->uuid)->with('success', 'Agendado com sucesso!');
        }

        return redirect()->route('schedule.index')->with('success', 'Agendado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Schedule::findOrFail($id);

        return view('schedule.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$this->validate($request, $this->rules);

        $data = $request->request->all();

        $task = Schedule::findOrFail($id);
        $task->notas = $request->input('notas');
        $status = $request->input('status');

        $data['inicio'] = \DateTime::createFromFormat('d/m/Y H:i', $data['inicio']);
        $data['fim'] = \DateTime::createFromFormat('d/m/Y H:i', $data['fim']);

        $task->inicio = $data['inicio'];
        $task->fim = $data['fim'];

        if ($status == 1) {

            $task->status_id = 3;
            $return_msg = 'Compromisso Finalizado !!!';

        } else {

            $task->status_id = 1;
            $return_msg = 'Compromisso Atualizado!';

        }

        $task->save();

        return Redirect::route('schedule.index')->with('status', $return_msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Schedule::findOrFail($id);

        $agendaOld = $agenda;

        $agenda->delete();

        $return_msg = 'Agendamento Removido !!!';

        if(!empty($agendaOld->guia_id)) {
          $guia = Guia::findOrFail($agendaOld->guia_id);
          return Redirect::route('guias.edit', $guia->uuid)->with('status', $return_msg);
        }

        return Redirect::route('schedule.index')->with('status', $return_msg);
    }
}
