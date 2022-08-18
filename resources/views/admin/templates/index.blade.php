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
                    <h3 class="card-title">Templates</h3>
                    <div class="card-tools">
                        <a href="{{route('templates.create')}}" class="btn btn-block btn-outline-primary">
                            Adicionar
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ordem</th>
                                <th>Nome</th>
                                <th>Modelo PDF</th>
                                <th>Tutorial</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($templates as $template)
                                <tr>
                                    <td>{{$template->id_templates}}</td>
                                    <td>{{$template->order}}</td>
                                    <td>{{$template->name}}</td>
                                    <td>{{$template->path}}</td>
                                    <td>{{$template->link_tutorial}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('templates.edit', ['template' => $template->id_templates])}}">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
