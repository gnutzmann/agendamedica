<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgendaMarcacao;
use App\Paciente;

class AgendaMarcacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $agenda
     * @return \Illuminate\Http\Response
     */
    public function index($agenda_id)
    {
        $marcacoes = AgendaMarcacao::listaMarcacoes($agenda_id);
        
        return view('agenda.agendamarcacao.index', compact('marcacoes', 'agenda_id'));    
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $agenda_id
     * @return \Illuminate\Http\Response
     */
    public function create($agenda_id)
    {   

        $user = auth()->user();
        $pacientes = Paciente::listaPacienteMedico($user->medico_id);        

        return view('agenda.agendamarcacao.create',compact('agenda_id','pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  int  $agenda_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $agenda_id)
    {       
        $marcacao = new AgendaMarcacao;
        $marcacao->agenda_id    = $agenda_id;
        $marcacao->data         = $request->data;
        $marcacao->hora_inicial = $request->hora_inicial;
        $marcacao->hora_final   = $request->hora_final;
        $marcacao->paciente_id  = $request->paciente_id;
        $marcacao->save();        

        return redirect()->route('agenda.marcacao.index', compact('agenda_id'))->with('alert-success', 'Agendamento marcado com sucesso!');
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
     * @param  int $agenda_id,
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($agenda_id,$id)
    {
        $marcacao = AgendaMarcacao::findOrFail($id);
        $nome_paciente = Paciente::findOrFail($marcacao->paciente_id)->nome;
        return view('agenda.agendamarcacao.edit', compact('marcacao','agenda_id','nome_paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $agenda_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $agenda_id, $id)
    {
        $marcacao = AgendaMarcacao::findOrFail($id);        
        $marcacao->evolucao_paciente = trim($request->evolucao_paciente);

        //dd($request->evolucao_paciente);

        $marcacao->save();

        return redirect()->route('agenda.marcacao.index', compact('agenda_id'))->with('alert-success', 'Evolução gravada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $agenda_id
     * @param  int  $id           * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($agenda_id,$id)
    {
        $marcacao  = AgendaMarcacao::findOrFail($id);              
        $marcacao->Delete();
        return redirect()->route('agenda.marcacao.index', compact('agenda_id'))->with('alert-success', 'Agendamento desmarcado com sucesso!');
    }
}
