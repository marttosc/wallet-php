@extends('layouts.app')

@section('title', 'Página principal')

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="ion ion-card"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Cartões</span>
                <span class="info-box-number">
                    {{ Auth::user()->cards()->count() }}
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red">
                <i class="ion ion-social-usd"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Limite acumulado</span>
                <span class="info-box-number">
                    @if (Auth::user()->cards()->count() > 0)
                        {{ number_format(Auth::user()->cards()->cumulativeLimit(), 2, ',', '.') }}
                    @else
                        {{ number_format(0, 2, ',', '.') }}
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green">
                <i class="ion ion-ios-flag"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Bandeiras utilizadas</span>
                <span class="info-box-number">
                    {{ Auth::user()->cards()->uniqueFlags()->count() }}
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow">
                <i class="ion ion-clock"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Faturas a vencer</span>
                <span class="info-box-number">
                    {{ Auth::user()->cards()->closing()->count() }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
