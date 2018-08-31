<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa\Config;

class ConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        return view('configs.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $empresa = \Auth::user()->empresa;

        foreach ($data as $key => $item) {

            $config = \App\Models\Empresa\Config::where('empresa_id', $empresa->id)->get();

            $hasConfig = $config->filter(function($config) use($key) {
                return $config->config->slug == $key;
            });

            if($hasConfig->isNotEmpty()) {
                $config = $hasConfig->first();
                if($config->config->tipo == 'float') {
                  $config->valor = number_format(floatval($item), 2, ',', '.');
                } else {
                  $config->valor = $item;
                }

                $config->save();
            }
        }

        return redirect()->back()->with('success', 'Configurações atualizadas com sucesso!');
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
        //
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
        //
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
