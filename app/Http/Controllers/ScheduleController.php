<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Schedule\Status;
use Redirect;

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
        $tasks = Schedule::all();
        $status = Status::all();

        $tasksInComplete = $tasks->filter(function($task) {
            return $task->status_id == 1 || $task->status_id == 2;
        });

        $tasksComplete = $tasks->filter(function($task) {
            return $task->status_id == 3;
        });

        return view('schedule.index', compact('tasks', 'tasksInComplete', 'tasksComplete', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.create');
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

        $data['inicio'] = $data['fim'] = now();
        $data['user_id'] = \Auth::user()->id;
        $data['empresa_id'] = \Auth::user()->company_id;
        $data['status_id'] = 1;
        $schedule = Schedule::create($data);

        return redirect()->back();
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
        $this->validate($request, $this->rules);

        $task = Schedule::findOrFail($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $status = $request->input('status');

        if ($status == 1) {

            $task->status_id = 3;
            $return_msg = 'Compromisso Finalizado !!!';

        } else {

            $task->status_id = 1;
            $return_msg = 'Compromisso Atualizado!';

        }

        $task->save();

        return Redirect::back()->with('status', $return_msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
