@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Título</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{route('public.index', ['username' => 'teste'])}}">Teste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    {{ Log::info("Home acessado por ".Auth::user()); }}
@stop
