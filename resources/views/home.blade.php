@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($eventos as $evento)
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{$evento->name}}</strong>
                        </div>

                        <div class="card-body">
                            <p class="card-text">
                                {{$evento->description}}
                            </p>
                        </div>

                        <div class="card-footer">
                            <div class="row justify-content-around">
                                <a class="btn btn-app bg-info" href="{{route('publications', ['id' => $evento->id_events])}}">
                                    <i class="fas fa-sticky-note"></i>Publicações
                                </a>
                                <a class="btn btn-app bg-info">
                                    <i class="fas fa-school"></i>Escolas
                                </a>
                                <a class="btn btn-app bg-info" href="{{route('volunteer.register', ['id' => $evento->id_events])}}">
                                    <i class="fas fa-handshake"></i>Voluntários
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>Informações: </strong></div>

                        <div class="card-body">
                            Nenhum evento disponível no momento.
                        </div>
                    </div>
                </div>
            @endforelse
            
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    {{ Log::info("Home acessado por ".Auth::user()); }}
@stop
