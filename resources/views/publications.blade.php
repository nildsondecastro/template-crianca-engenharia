@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>{{$evento->name}}</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($evento->publications as $pub)
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{$pub->link}}" target="_blank" rel="noopener noreferrer">
                                <strong>{{$pub->name}}</strong>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><strong>Informações: </strong></div>

                        <div class="card-body">
                            Nenhuma publicação cadastrada.
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
    {{ Log::info("Publicações acessado por ".Auth::user()); }}
@stop
