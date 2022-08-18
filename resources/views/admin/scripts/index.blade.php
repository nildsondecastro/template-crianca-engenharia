@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Scripts</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Scripts</h3>
                    <div class="card-tools">
                        <a href="{{route('template.scripts.create', ['template' => $template->id_templates])}}" class="btn btn-block btn-outline-primary">
                            <i class="fas fa-fw fa-plus"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ordem</th>
                                <th>Template</th>
                                <th>Arquivo Local</th>
                                <th>Arquivo Remoto</th>
                                <th>Relações</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scripts as $script)
                                <tr>
                                    <td>{{$script->id_scripts}}</td>
                                    <td>{{$script->order}}</td>
                                    <td>{{$script->template->name ?? ''}}</td>
                                    <td>{{$script->local_path}}</td>
                                    <td>{{$script->link}}</td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('template.scripts.edit', ['template' => $template->id_templates, 'script' => $script->id_scripts])}}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <a class="btn btn-primary" href="{{route('template.scripts.show', ['template' => $template->id_templates, 'script' => $script->id_scripts])}}">
                                            <i class="fas fa-fw fa-eye"></i>
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
@stop
