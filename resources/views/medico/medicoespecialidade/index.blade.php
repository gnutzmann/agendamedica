@extends('layouts.app') 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Especialidades médicas</li>
                </ol>
            </nav>

            <div class="col-md-8 p-0">
                <h2>Especialidades médicas</h2>
            </div>
        
            <hr />

            <div class="col-md-8 pl-0">
                <a href="{{action('MedicoEspecialideController@create')}}" class="btn btn-primary pull-right h2">Nova especialidade</a>
            </div>        
            
            <div class="card-deck justify-content-center">
                @foreach($especialidades as $especialidade)

                    <div class="row col-xs-8 col-md-6 p-2">
                        <div class="card col-xs-8 col-md-12 p-0">                    
                            <h5 class="card-header">{{ $especialidade['nome'] }}</h5>
                            <div class="card-body align-itens-bottom">                                                                                        
                                    <span class="input-group-btn m-1">
                                        <form action="{{action('AgendaController@destroy', $especialidade['id'])}}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-xs" style="color:white;max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                            <span class="fa fa-trash-alt"></span>
                                            </button>
                                        </form>
                                    </span>
                            </div>                                
                        </div>                            
                    </div>                 
                @endforeach
            </div>               
        </div>
    </div>
</div>
@endsection