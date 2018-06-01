@extends('layouts.app') 
@section('content')
<div id="main" class="container justify-content-center">
    
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
        </ol>
    </nav>    
    
    <div id="top" class="row">
        <div class="col-sm-12">
            <h2>Cadastro de pacientes</h2>
        </div>

    </div>    

    <hr />

    <div class="row">

        <div class="col-sm-3 col-md-6">
            <a href="{{action('PacienteController@create')}}" class="btn btn-primary pull-right h2">Novo paciente</a>
        </div>

        <div class="col-sm-6 col-md-6 float-right">
            <form action="{{ action('PacienteController@index') }}" method="get">
                <div class="input-group">
                    <input name="busca" class="form-control" id="busca" type="text" placeholder="Pesquisar">
                    <span class="input-group-btn">
    		    			<button class="btn btn-primary" type="submit">
    		    			<span class="fa fa-search"></span>
                    </button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div id="lista" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped table-bordered table-hover" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>                        
                        <th>Nome</th>
                        <th>Data de nascimento</th>
                        <th>e-mail</th>
                        <th colspan="3" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                    <tr>
                        <td class="">{{$paciente->id}}</td>                        
                        <td class="">{{$paciente->nome}}</td>
                        <td class="">{{date('d/m/Y',strtotime($paciente->data_nascimento))}}</td>
                        <td class="">{{$paciente->email}}</td>

                        <td>
                            <div class="form-inline justify-content-center">
                            <span class="input-group-btn m-1">
                            <a class="btn btn-success btn-xs" href="#" style="color:white;max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Compartilhar">
                                <span class="fa fa-share"></span>
                            </a>
                            </span>                      
                        
                            <span class="input-group-btn m-1">
                                <a class="btn btn-warning btn-xs" href="{{action('PacienteController@edit', $paciente->id)}}" style="color:white; max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Alterar">
                                    <span class="fa fa-edit"></span>
                            </a>
                            </span>

                            <span class="input-group-btn m-1">
                                <form action="{{action('PacienteController@destroy', $paciente->id)}}" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-xs" style="color:white;max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                        <span class="fa fa-trash-alt"></span>                                    
                                    </button>
                                </form>
                            </span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>    

    <div id="bottom" class="row">
        <div class="col-md-12">
            <div align="center">{{$pacientes}}</div>
            
        </div>
    </div>
    
</div>
@endsection