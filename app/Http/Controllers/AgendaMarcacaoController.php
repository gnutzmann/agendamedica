<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgendaMarcacao;

class AgendaMarcacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $agenda
     * @return \Illuminate\Http\Response
     */
    public function index($agenda_id)
    {
        $marcacoes = AgendaMarcacao::where('agenda_id', '=', $agenda_id)->orderBy('data', 'hora_inicial')->paginate(10);

        //dd($marcacoes[0]->paciente());

        return view('agenda.agendamarcacao.index', compact('marcacoes'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('agenda.agendamarcacao.create');
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
