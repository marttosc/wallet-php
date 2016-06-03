@extends('layouts.app')

@section('title', 'Meus cartões de crédito')

@section('description')
<a href="{{ route('dashboard.card.create') }}" class="btn btn-sm btn-success">
    <i class="glyphicon glyphicon-plus"></i>
    Adicionar
</a>
@endsection

@section('content')
@if (session('message'))
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Informação!</h4>
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif

@if (session('success-message'))
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Tudo certo!</h4>
                {{ session('success-message') }}
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cartões cadastrados</h3>
            </div>

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número</th>
                            <th>CVC</th>
                            <th>Bandeira</th>
                            <th>Limite</th>
                            <th>Vencimento</th>
                            <th>Adicionado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cards as $card)
                            <tr>
                                <td class="text-center">{{ $card->id }}</td>
                                <td class="text-center">{{ $card->card }}</td>
                                <td class="text-center">{{ $card->cvc }}</td>
                                <td class="text-center">{{ $card->flag->name }}</td>
                                <td class="text-center">{{ number_format($card->limit, 2, ',', '.') }}</td>
                                <td class="text-center">{{ $card->expires_in->format('m/Y') }}</td>
                                <td class="text-center">{{ $card->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dashboard.card.edit', $card->id) }}" class="label label-warning">Editar</a>

                                    <a href="javascript:void();" class="label label-danger" data-action="destroy" data-id="{{ $card->id }}">Excluir</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="9">
                                    Não há cartões registrados. <a href="{{ route('dashboard.card.create') }}">Adicionar novo</a>.
                                </td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>

                @foreach ($cards as $card)
                    {!! Form::open(['route' => ['dashboard.card.destroy', $card->id], 'method' => 'delete', 'data-id' => $card->id, 'data-action' => 'destroy']) !!}
                    {!! Form::close() !!}
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection