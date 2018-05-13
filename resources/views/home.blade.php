@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body ">
                    <div class="row p-0 justify-content-center">

                        <div class="card text-white bg-success m-4 col-sm-10 col-md-5">
                            <div class="card-header"><strong>Agendas</strong></div>
                            <div class="card-body">
                                <h5 class="card-title">Visualize as agendas</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="{{ route('agendas.index') }}" class="btn btn-light">Acesse</a>
                            </div>
                        </div>

                    <div class="card text-white bg-info m-4 col-sm-10 col-md-5">
                        <div class="card-header"><strong>Pacientes</strong></div>
                        <div class="card-body">
                            <h5 class="card-title">Cadastro de pacientes</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-light">Acesse</a>
                        </div>
                    </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection