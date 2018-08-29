<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Pessoa\Tipo;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        $empresaId = $user->empresa_id;

        $empresas = Empresa::all();

        $tipos = Tipo::pluck('nome', 'id')->toArray();

        return view('empresas.index', compact('empresas', 'tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view('empresas.create', compact('tipos'));
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

        if(!empty($data['aniversario_fundacao'])) {
            $data['aniversario_fundacao'] = \DateTime::createFromFormat('d/m/Y', $data['aniversario_fundacao']);
        } else {
          $data['aniversario_fundacao'] = null;
        }

        Empresa::create($data);

        return redirect()->route('empresas.index')->with('success', 'Empresa adicionada com sucesso!');
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
        $empresa = Empresa::findOrFail($id);
        $tipos = Tipo::all();

        return view('empresas.edit', compact('empresa', 'tipos'));
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

        if(!empty($data['aniversario_fundacao'])) {
            $data['aniversario_fundacao'] = \DateTime::createFromFormat('d/m/Y', $data['aniversario_fundacao']);
        } else {
          $data['aniversario_fundacao'] = null;
        }

        $empresa = Empresa::findOrfail($id);
        $empresa->update($data);

        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrfail($id);
        $empresa->delete();

        return redirect()->route('empresas.index')->with('success', 'Empresa deletada com sucesso!');
    }
}
