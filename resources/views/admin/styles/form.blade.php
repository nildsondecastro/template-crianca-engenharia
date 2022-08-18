@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Estilo</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Adicionar Estilo ao {{$template->name}}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{($model ?? null)? route('template.styles.update', ['template' => $template->id_templates, 'style' => $model->id_styles]) : route('template.styles.store', ['template' => $template->id_templates])}}" enctype="multipart/form-data">
                        @csrf
                        @if ($model ?? null)
                            @method('PUT')
                        @endif

                        <div class="row">

                            <input type="hidden" name="id_templates" value="{{$template->id_templates}}" required>

                            <div class="col-sm-12">
                                @include('inputs.storeOrder')
                            </div>

                            <div class="col-sm-12">
                                @include('inputs.storeLocalPath')
                            </div>

                            <div class="col-sm-12">
                                @include('inputs.storeLink')
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
    {{ Log::info('Home acessado por ' . Auth::user()) }}
@stop
