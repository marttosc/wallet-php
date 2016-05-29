<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Login - Wallet!</title>

        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ route('site') }}">
                    Wallet<strong>!</strong>
                </a>
            </div>

            <div class="login-box-body">
                <p class="login-box-msg">Faça login para iniciar sua sessão</p>

                {!! Form::open(['url' => 'login']) !!}

                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('remember', 'remember') !!} Lembrar acesso
                                </label>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            {!! Form::submit('Fazer Login', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}

                <a href="{{ url('register') }}" class="text-center">Registre-se</a>
            </div>
        </div>

        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/adminlte.js') }}"></script>
    </body>
</html>