<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Role};
use App\Models\{Pessoa, Empresa};
use App\Models\Pessoa\{Tipo, Grupo, Fisica as PessoaFisica, Juridica as PessoaJuridica, Endereco as PessoaEndereco, Telefone as PessoaTelefone};

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        if($user->isOwner()) {
          $pessoas = Pessoa::all();
        } else {
          $pessoas = Pessoa::where('empresa_id', \Auth::user()->empresa_id)->get();
        }

        return View('contatos.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::all();
        $grupos = Grupo::all();
        $empresas = Empresa::all();

        return view('contatos.create', compact('tipos', 'grupos', 'empresas'));
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

        //$data['empresa_id'] = \Auth::user()->empresa_id;

        $pessoa = Pessoa::create($data);

        $data['pessoa_id'] = $pessoa->id;

        if($data['tipo_id'] == 1) {

            if(!empty($data['nascimento'])) {
                $data['nascimento'] = \DateTime::createFromFormat('d/m/Y', $data['nascimento']);
            } else {
              $data['nascimento'] = null;
            }

            $pf = PessoaFisica::create($data);

        } elseif($data['tipo_id'] == 2) {

          if(!empty($data['fundacao'])) {
              $data['fundacao'] = \DateTime::createFromFormat('d/m/Y', $data['fundacao']);
          }

          $pj = PessoaJuridica::create($data);

        }

        if(!empty($data['endereco']) || !empty($data['bairro']) || !empty($data['cidade']) || !empty($data['cep']) || !empty($data['uf'])) {
          $pe = PessoaEndereco::create($data);
        }

        if(!empty($data['telefone'])) {
            $telefone = new PessoaTelefone();
            $telefone->tipo_contato_id = 1;
            $telefone->numero = $data['telefone'];
            $telefone->pessoa_id = $data['pessoa_id'];
            $telefone->save();
        }

        if(!empty($data['telefone_comercial'])) {
            $telefone = new PessoaTelefone();
            $telefone->tipo_contato_id = 2;
            $telefone->numero = $data['telefone_comercial'];
            $telefone->pessoa_id = $data['pessoa_id'];
            $telefone->save();
        }

        if(!empty($data['celular'])) {
            $telefone = new PessoaTelefone();
            $telefone->tipo_contato_id = 3;
            $telefone->numero = $data['celular'];
            $telefone->pessoa_id = $data['pessoa_id'];
            $telefone->save();
        }

        return redirect()->route('contatos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = Pessoa::uuid($id);

        return view('contatos.show', compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = Pessoa::uuid($id);
        $tipos = Tipo::all();
        $grupos = Grupo::all();

        $data = [
            'pessoa' => $pessoa,
            'tipos' => $tipos,
            'grupos' => $grupos
        ];

        return view('contatos.edit')->with($data);
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

        $data['empresa_id'] = \Auth::user()->empresa_id;

        $pessoa = Pessoa::findOrFail($id);

        $hasUpdated = $pessoa->update($data);

        if($hasUpdated) {

            $data['pessoa_id'] = $pessoa->id;

            //if($data['tipo_id'] == 1) {

                if(!empty($data['nascimento'])) {
                    $data['nascimento'] = \DateTime::createFromFormat('d/m/Y', $data['nascimento']);
                }

                $pf = PessoaFisica::where('pessoa_id', $pessoa->id)->get();
                if($pf->isNotEmpty()) {
                  $pf->first()->update($data);
                }

            //}

              $pe = PessoaEndereco::where('pessoa_id', $pessoa->id)->get();

              if($pe->isNotEmpty()) {
                $pe->first()->update($data);
              }

            if(!empty($data['telefone'])) {
                $telefone = PessoaTelefone::where('pessoa_id', $pessoa->id)->where('tipo_contato_id', 1)->get();
                if($telefone->isNotEmpty()) {
                  $telefone->first()->update($data);
                }
            }

            if(!empty($data['telefone_comercial'])) {

              $telefone = PessoaTelefone::where('pessoa_id', $pessoa->id)->where('tipo_contato_id', 2)->get();
              if($telefone->isNotEmpty()) {
                $telefone->first()->update($data);
              }

            }

            if(!empty($data['celular'])) {

              $telefone = PessoaTelefone::where('pessoa_id', $pessoa->id)->where('tipo_contato_id', 3)->get();
              if($telefone->isNotEmpty()) {
                $telefone->first()->update($data);
              }

            }
        }

        return redirect()->route('contatos.index');
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
            $pessoa = Pessoa::findOrFail($id);

            if($pessoa->agendamentos->isNotEmpty()) {
              return redirect()->route('contatos.index')->with('error', 'Este Contato não pode ser deletado, possui agendamentos vinculados!');
            }

            $pessoa->fisica()->delete();

            $pessoa->telefones->map(function($telefone) {
                $telefone->delete();
            });

            $pessoa->enderecos->map(function($endereco) {
                $endereco->delete();
            });

            $pessoa->contatos->map(function($contato) {
                $contato->delete();
            });

            $pessoa->delete();

            return redirect()->route('contatos.index')->with('success', 'Contato deletado!');

        } catch(Exception $e) {
            return back()->with('error', trans('usersmanagement.deleteSelfError'));
        }
    }
}
