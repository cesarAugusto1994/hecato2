<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Agendamento\Guia;

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

        $guias = Guia::where('empresa_id', $user->empresa_id)->get();

        return view('guias.index', compact('guias'));
    }

    public function confirmarPagamento(Request $request, $id)
    {
        $guia = Guia::uuid($id);
        $guia->status_id = 2;
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
        //
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
