<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa\Contato;

class PessoaContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pessoa = $request->get('pessoa');

        return view('contatos.contato.create', compact('pessoa'));
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

        if(!empty($data['aniversario'])) {
            $data['aniversario'] = \DateTime::createFromFormat('d/m/Y', $data['aniversario']);
        }

        $contato = Contato::create($data);

        return redirect()->route('contatos.edit', $contato->pessoa->uuid);
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
        $contato = Contato::findOrFail($id);

        return view('contatos.contato.edit', compact('contato'));
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

        $contato = Contato::findOrFail($id);

        if(!empty($data['aniversario'])) {
            $data['aniversario'] = \DateTime::createFromFormat('d/m/Y', $data['aniversario']);
        }

        $contato->update($data);

        return redirect()->route('contatos.edit', $contato->pessoa->uuid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);

        dd($contato);

        $contato->delete();

        return redirect()->route('contatos.edit', $contato->pessoa->uuid);
    }
}
