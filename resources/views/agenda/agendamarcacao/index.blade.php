@extends('layouts.app') 
@section('content')
<div id="main" class="container justify-content-center">

    <div id="top" class="row">
        <div class="col-sm-12">
            <h2>Agenda - Marcações</h2>
        </div>

    </div>
    <!-- /#top -->

    <hr />

    <div class="row">

        <div class="col-sm-3 col-md-6">
            {{-- <a href="{{action('AgendaMarcacaoController@create',)}}" class="btn btn-primary pull-right h2">Nova marcação</a> --}}
            <a href="#" class="btn btn-primary pull-right h2">Nova marcação</a>
        </div>

        <div class="col-sm-6 col-md-6 float-right">

            <div class="input-group h2">
                <input name="busca" class="form-control" id="busca" type="text" placeholder="Pesquisar">
                <span class="input-group-btn">
    					<button class="btn btn-primary" type="submit">
    					<span class="fa fa-search"></span>
                </button>
                </span>
            </div>

        </div>
    </div>

    <div id="lista" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora inicial</th>                        
                        <th>Paciente</th>                        
                        <th colspan="3" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marcacoes as $marcacao)
                    <tr>
                        <td class="">{{ date('d-m-Y',strtotime($marcacao['data'])) }}</td>
                        <td class="">{{ date('H:i',strtotime($marcacao['hora_inicial'])) }}</td>                        
                        <td class="">{{ $marcacao['paciente_id'] }}</td>                        

                        <td>                       
                            <span class="input-group-btn m-1">
                                {{-- <a class="btn btn-warning btn-xs" href="{{action('AgendaController@edit', $marcacao['id'])}}" style="color:white; max-width: 38px"> --}}
                            <a class="btn btn-warning btn-xs" href="#" style="color:white; max-width: 38px">
                                <span class="fa fa-edit"></span>
                            </a>
                            </span>

                            <span class="input-group-btn m-1">
                                {{-- <form action="{{action('AgendaController@destroy', $marcacao['id'])}}" method="POST"> --}}
                                    <form action="#" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-xs" style="color:white;max-width: 38px">
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
    <!-- /#list -->

    <div id="bottom" class="row">
        <div class="col-md-12">
            <div align="center">{{$marcacoes}}</div>
            <!-- /.pagination -->
        </div>
    </div>
    <!-- /#bottom -->
</div>
<!-- /#main -->

@endsection