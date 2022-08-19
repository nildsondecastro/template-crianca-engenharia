@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Item da Sessão</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Adicionar Item na {{$holding->name}}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{($model ?? null)? route('holding.holdings_items.update', ['holding' => $holding->id_holdings, 'holdings_item' => $model->id_holdings_items]) : route('holding.holdings_items.store', ['holding' => $holding->id_holdings])}}" enctype="multipart/form-data">
                        @csrf
                        @if ($model ?? null)
                            @method('PUT')
                        @endif

                        <div class="row">

                            <input type="hidden" name="id_holdings" value="{{$holding->id_holdings}}" required>

                            <div class="col-sm-12">
                                @include('inputs.storeType')
                            </div>

                            <div class="col-sm-12">
                                @include('inputs.storeOrder')
                            </div>

                            <div class="col-sm-12">
                                @include('inputs.storePathImg')
                            </div>

                            <div class="col-sm-12">
                                @include('inputs.storeText')
                            </div>

                            <div class="col-sm-12">
                                @include('inputs.storePathFile')
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
