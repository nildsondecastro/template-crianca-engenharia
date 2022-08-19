@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Items da Sessão</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Items da Sessão {{$holding->name}}</h3>
                    <div class="card-tools">
                        <a href="{{route('holding.holdings_items.create', ['holding' => $holding->id_holdings])}}" class="btn btn-block btn-outline-primary">
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
                                <th>Sessão</th>
                                <th>Tipo</th>
                                <th>Imagem</th>
                                <th>Texto</th>
                                <th>Arquivo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($holdingsitems as $holdings_item)
                                <tr>
                                    <td>{{$holdings_item->id_holdings_items}}</td>
                                    <td>{{$holdings_item->order}}</td>
                                    <td>{{$holdings_item->holding->name ?? ''}}</td>
                                    <td>{{$holdings_item->type}}</td>

                                    <td>{{$holdings_item->path_img}}</td>
                                    <td>{{$holdings_item->text}}</td>
                                    <td>{{$holdings_item->path_file}}</td>

                                    <td>
                                        <a class="btn btn-success" href="{{route('holding.holdings_items.edit', ['holding' => $holding->id_holdings, 'holdings_item' => $holdings_item->id_holdings_items])}}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <a class="btn btn-primary" href="{{route('holding.holdings_items.show', ['holding' => $holding->id_holdings, 'holdings_item' => $holdings_item->id_holdings_items])}}">
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
