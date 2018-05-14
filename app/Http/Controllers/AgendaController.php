<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $agendas = Agenda::where('medico','=',$user['medico'])->orderBy('nome', 'asc')->paginate(3);
        return view('agendas.index', compact('agendas'));
    }

    public function create()
    {
        return view('agendas.create');
    }

    public function store(Request $request)
    {        
        $user = auth()->user();

        $agendas = new Agenda;
        $agendas->nome   = $request->nome;
        $agendas->medico = $user['medico'];        
        $agendas->save();
        return redirect()->route('agendas.index')->with('message', 'Agenda criada com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agendas.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {

        //dd($request);
        $agenda = Agenda::findOrFail($id);
        $agenda->nome = $request->nome;        
        $agenda->ativa = $request->ativa;        
        $agenda->save();
        return redirect()->route('agendas.index')->with('message', 'Agenda atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $agendas = Agenda::findOrFail($id);
        $agendas->delete();
        return redirect()->route('agendas.index')->with('alert-success', 'A agenda foi removida com sucesso!');
    }    
}