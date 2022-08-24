@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Voluntário</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($voluntario)
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>Informações: </strong></div>
                        <div class="card-body">
                            Você tem cadastro neste evento.
                        </div>
                    </div>
                </div>
            @else
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>Informações: </strong></div>
                        <div class="card-body">
                            <p class="card-text">
                                Você não tem cadastro neste evento.
                            </p>
                            <p class="card-text">
                                Período de inscrição de voluntários: <br>
                                de {{date('d/m/Y H:i:s', strtotime($evento->start_registration_volunteers))}} <br>
                                até {{date('d/m/Y H:i:s', strtotime($evento->end_registration_volunteers))}}
                            </p>
                            <p class="card-text">
                                <strong>Para ser voluntário é necessário estar matriculado em uma instituição de ensino superior.</strong>
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-content-around">
                                <a class="btn btn-app bg-info" data-toggle="modal" data-target="#modal-lg">
                                    <i class="fas fa-user-plus"></i>Participar como Voluntário
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <div class="modal fade show" id="modal-lg" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <form action="#" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmar Inscrição</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>
                            Verifique todos os dados, pois serão utilizados para a elaboração dos certificados.
                            Lembre-se de assinar sua presença no dia e local do evento.
                        </p>

                        <strong>
                            <p>Nome: {{Auth::user()->name}}</p>
                            <p>CPF: {{Auth::user()->cpf}}</p>
                            <p>Telefone: {{Auth::user()->phone}}</p>
                        </strong>

                        @include('inputs.storeName')
                        
                        
                        

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </form>
            

        </div>

    </div>
@stop

@section('css')
@stop

@section('js')
    {{ Log::info('Tela de Voluntário acessado por ' . Auth::user()) }}
@stop
