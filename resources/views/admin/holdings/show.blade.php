@extends('adminlte::page')

@section('title', 'Página Inicial')

@section('content_header')
    <h1>Sessão</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Visualizar Sessão</h3>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Template</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? ($model->template->name ?? null)}}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            @include('shows.storeOrder')
                        </div>
                        <div class="col-sm-12">
                            @include('shows.storeName')
                        </div>

                        <div class="col-sm-12">
                            <form action="{{route('template.holdings.destroy', ['template' => $template->id_templates, 'holding' => $model->id_holdings])}}" method="POST">
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
@stop
