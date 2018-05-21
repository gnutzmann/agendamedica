@extends('layouts.app') 
@section('content')
<div id="main" class="container justify-content-center">

    <div id="top" class="row">
        <div class="col-sm-12">
            <h2>Lista de agendas</h2>
        </div>

    </div>
    <!-- /#top -->

    <hr />

    <div class="row">

        <div class="col-sm-3 col-md-6">
            <a href="{{action('AgendaController@create')}}" class="btn btn-primary pull-right h2">Nova agenda</a>
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
                        <th>Agenda</th>
                        <th class="d-none d-sm-block">Ativa</th>
                        <th colspan="3" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendas as $agenda)
                    <tr>
                        <td class=""> <a href="#">{{$agenda['nome']}}</a></td>

                        @if ($agenda['ativa'] == 1)
                            <td class="d-none d-sm-block">Sim</td>
                        @else
                            <td class="d-none d-sm-block">Não</td>
                        @endif

                        <td>
                            <div class="form-inline justify-content-center">
                                <span class="input-group-btn m-1">
                                    <a class="btn btn-success btn-xs" href="{{ action('AgendaMarcacaoController@index', $agenda['id']) }}" style="color:white;max-width: 38px">
                                    <span class="fa fa-calendar-check"></span>
                                </a>
                                </span>                      
                            
                                <span class="input-group-btn m-1">
                                    <a class="btn btn-warning btn-xs" href="{{action('AgendaController@edit', $agenda['id'])}}" style="color:white; max-width: 38px">
                                        <span class="fa fa-edit"></span>
                                </a>
                                </span>
                            
                                <span class="input-group-btn m-1">
                                    <form action="{{action('AgendaController@destroy', $agenda['id'])}}" method="POST">
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
            <div align="center">{{$agendas}}</div>
            <!-- /.pagination -->
        </div>
    </div>
    <!-- /#bottom -->
</div>
<!-- /#main -->

@endsection