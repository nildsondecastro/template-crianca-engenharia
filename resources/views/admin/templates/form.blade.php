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
                    <h3 class="card-title">Adicionar Template</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{($model ?? null)? route('templates.update', ['template' => $model->id_templates]) : route('templates.store')}}" enctype="multipart/form-data">
                        @csrf
                        @if ($model ?? null)
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-sm-12">
                                @include('inputs.storeName')
                            </div>

                            <div class="col-sm-12">
                                @include('inputs.storeOrder')
                            </div>

                            <div class="col-sm-12">
                                @include('inputs.storePath')
                            </div>

                            <div class="col-sm-12">
                                @include('inputs.storeLinkTutorial')
                            </div>

                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit">Adicionar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
