@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('plugins/datepicker/css/datepicker.css') }}" rel="stylesheet">
@endsection

@section('title', 'Editar cartão #' . $card->id)

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Alterar limite ou data de vencimento</h3>
            </div>

            {!! Form::open(['route' => ['dashboard.card.update', $card->id], 'method' => 'put']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Bandeira</label>
                                <p class="form-control-static">{{ $card->flag->name }}</p>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Número do cartão</label>
                                <p class="form-control-static">{{ $card->card }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>CVC</label>
                                <p class="form-control-static">{{ $card->cvc }}</p>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Validade</label>
                                <p class="form-control-static">{{ $card->expires_in->format('m/Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('closes_at') ? ' has-error' : '' }}">
                                {{ Form::label('closes_at', 'Data de fechamento') }}
                                {{ Form::text('closes_at', $card->closes_at->format('d/m/Y'), ['class' => 'form-control datepicker-closes']) }}

                                @if ($errors->has('closes_at'))
                                    <span class="help-block">{{ $errors->first('closes_at') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('limit') ? ' has-error' : '' }}">
                                {{ Form::label('limit', 'Limite') }}
                                {{ Form::number('limit', $card->limit, ['class' => 'form-control']) }}

                                @if ($errors->has('limit'))
                                    <span class="help-block">{{ $errors->first('limit') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <a href="{{ route('dashboard.card.index') }}" class="btn btn-default">Cancelar</a>
                    {{ Form::submit('Salvar', ['class' => 'btn btn-primary pull-right']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('javascripts')
<script src="{{ asset('plugins/datepicker/js/datepicker.js') }}"></script>

<script type="text/javascript">
    /**
     * Edit card functions.
     */
    $(function() {
        $('.datepicker-closes').datepicker({
            autoclose: true,
            clearBtn: true,
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });
    });
</script>
@endsection