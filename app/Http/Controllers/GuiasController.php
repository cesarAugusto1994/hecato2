<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Agendamento\Guia;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;
use App\Models\Schedule\Status;
use App\Models\{Pessoa, Empresa};

class GuiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $guias = Guia::where('empresa_id', $user->empresa_id);

        if($request->has('client')) {
          $pessoa = Pessoa::uuid($request->get('client'));
          $guias->where('pessoa_id', $pessoa->id);
        }

        $guias = $guias->orderByDesc('id')->get();
        return view('guias.index', compact('guias'));
    }

    public function confirmarPagamento(Request $request, $id)
    {
        $guia = Guia::uuid($id);
        $guia->status_id = 2;
        $guia->data_pagamento = now();
        $guia->save();

        return redirect()->route('guias.index')->with('success', 'Pagamento confirmado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('guias.create');
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

        $validator = Validator::make($data,
            [
                'pessoa_id'        => 'required|integer',
                'status_id'        => 'required',
                'data_vencimento'  => 'required',
                'valor'            => 'required',
            ]
        );

        if($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }

        $current = \Auth::user();

        $data['data_vencimento'] = \DateTime::createFromFormat('d/m/Y', $data['data_vencimento']);
        $data['valor'] = number_format(str_replace(array('.', ','), array('', '.'), $data['valor']), 2, '.', '');
        $data['empresa_id'] = $current->empresa_id;

        if($data['status_id'] == 2) {
          $data['data_pagamento'] = now();
        }

        $guia = Guia::create($data);

        return redirect()->route('guias.edit', $guia->uuid)
        ->with('success', 'Nova Guia adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guia = Guia::uuid($id);

        return view('guias.edit', compact('guia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guia = Guia::uuid($id);

        $tasks = Schedule::where('guia_id', $guia->id)->orderByDesc('id')->get();
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

        return view('guias.edit', compact('guia', 'tasks', 'tasksInComplete', 'tasksComplete', 'status', 'tasksCancelados'));
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
        $data = $request->request->all();

        $validator = Validator::make($data,
            [
                'pessoa_id'        => 'required|integer',
                'status_id'        => 'required',
                'data_vencimento'  => 'required',
            ]
        );

        if($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }

        $current = \Auth::user();

        $data['data_vencimento'] = \DateTime::createFromFormat('d/m/Y', $data['data_vencimento']);

        if($request->has('valor')) {
            $data['valor'] = str_replace(array('.', ','), array('', '.'), $data['valor']);
        }

        $guia = Guia::findOrFail($id);
        $guia->update($data);

        return redirect()->back()->with('success', 'Guia atulizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $currentUser = \Auth::user();
            $guia = Guia::findOrFail($id);
            $guia->delete();

            return redirect()->route('guias.index')->with('success', 'Guia deletada!');

        } catch(Exception $e) {
            return back()->with('error', trans('usersmanagement.deleteSelfError'));
        }
    }
}
