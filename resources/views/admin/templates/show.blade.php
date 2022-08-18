@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Templates</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Visualizar Template</h3>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            @include('shows.storeName')
                        </div>
                        <div class="col-sm-12">
                            @include('shows.storeOrder')
                        </div>
                        <div class="col-sm-12">
                            @include('shows.storePath')
                        </div>
                        <div class="col-sm-12">
                            @include('shows.storeLinkTutorial')
                        </div>

                        <div class="col-sm-12">
                            <form action="{{route('templates.destroy', ['template' => $model->id_templates])}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>
                            </form>
                            
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    {{ Log::info('Home acessado por ' . Auth::user()) }}
@stop
