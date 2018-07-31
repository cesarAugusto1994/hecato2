<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Agendamento\Guia;
use Illuminate\Support\Facades\Validator;

class GuiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $guias = Guia::where('empresa_id', $user->empresa_id)->orderByDesc('id')->get();

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
    public function create()
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
        //$data['valor'] = number_format($data['valor'], 2);
        $data['valor'] = number_format(str_replace(array('.', ','), array('', '.'), $data['valor']), 2, '.', '');
        $data['empresa_id'] = $current->empresa_id;

        if($data['status_id'] == 2) {
          $data['data_pagamento'] = now();
        }

        Guia::create($data);

        return redirect()->route('guias.index')->with('success', 'Nova Guia adicionado com sucesso!');
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

        return view('guias.edit', compact('guia'));
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
                'valor'            => 'required',
            ]
        );

        if($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }

        $current = \Auth::user();

        $data['data_vencimento'] = \DateTime::createFromFormat('d/m/Y', $data['data_vencimento']);
        #$data['valor'] = number_format($data['valor'], 2, '.', ',');
        $data['valor'] = str_replace(array('.', ','), array('', '.'), $data['valor']);

        $guia = Guia::findOrFail($id);
        $guia->update($data);

        return redirect()->route('guias.index')->with('success', 'Guia atulizada com sucesso!');
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
