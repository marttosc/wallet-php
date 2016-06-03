@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('plugins/datepicker/css/datepicker.css') }}" rel="stylesheet">
@endsection

@section('javascripts')
<script src="{{ asset('plugins/datepicker/js/datepicker.js') }}"></script>
@endsection

@section('title', 'Cadastrar novo cartão')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Adicionar novo cartão</h3>
            </div>

            {!! Form::open(['route' => 'dashboard.card.create', 'method' => 'put']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('flag') ? ' has-error' : '' }}">
                                {{ Form::label('flag', 'Bandeira') }}
                                {{ Form::select('flag', $flags, old('flag'), ['class' => 'form-control']) }}

                                @if ($errors->has('flag'))
                                    <span class="help-block">{{ $errors->first('flag') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('card') ? ' has-error' : '' }}">
                                {{ Form::label('card', 'Número do cartão') }}
                                {{ Form::text('card', old('card'), ['class' => 'form-control']) }}

                                @if ($errors->has('card'))
                                    <span class="help-block">{{ $errors->first('card') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('cvc') ? ' has-error' : '' }}">
                                {{ Form::label('cvc', 'Código de segurança') }}
                                {{ Form::text('cvc', null, ['class' => 'form-control', 'maxlength' => '3']) }}

                                @if ($errors->has('cvc'))
                                    <span class="help-block">{{ $errors->first('cvc') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('expires_in') ? ' has-error' : '' }}">
                                {{ Form::label('expires_in', 'Validade') }}
                                {{ Form::text('expires_in', null, ['class' => 'form-control datepicker-expires']) }}

                                @if ($errors->has('expires_in'))
                                    <span class="help-block">{{ $errors->first('expires_in') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('closes_at') ? ' has-error' : '' }}">
                                {{ Form::label('closes_at', 'Data de fechamento') }}
                                {{ Form::text('closes_at', null, ['class' => 'form-control datepicker-closes']) }}

                                @if ($errors->has('closes_at'))
                                    <span class="help-block">{{ $errors->first('closes_at') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('limit') ? ' has-error' : '' }}">
                                {{ Form::label('limit', 'Limite') }}
                                {{ Form::number('limit', null, ['class' => 'form-control']) }}

                                @if ($errors->has('limit'))
                                    <span class="help-block">{{ $errors->first('limit') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <a href="{{ route('dashboard.card.index') }}" class="btn btn-default">Cancelar</a>
                    {{ Form::submit('Cadastrar', ['class' => 'btn btn-primary pull-right']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection