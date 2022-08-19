@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Sessões</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sessões</h3>
                    <div class="card-tools">
                        <a href="{{route('template.holdings.create', ['template' => $template->id_templates])}}" class="btn btn-block btn-outline-primary">
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
                                <th>Nome</th>
                                <th>Relações</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($holdings as $holding)
                                <tr>
                                    <td>{{$holding->id_holdings}}</td>
                                    <td>{{$holding->order}}</td>
                                    <td>{{$holding->template->name ?? ''}}</td>
                                    <td>{{$holding->name}}</td>
                                    <td>
                                        <a class="btn btn-dark" href="{{route('holding.holdings_items.index', ['holding' => $holding->id_holdings])}}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('template.holdings.edit', ['template' => $template->id_templates, 'holding' => $holding->id_holdings])}}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <a class="btn btn-primary" href="{{route('template.holdings.show', ['template' => $template->id_templates, 'holding' => $holding->id_holdings])}}">
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
