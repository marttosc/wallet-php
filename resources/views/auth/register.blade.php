@if (count($errors) > 0)
    <div class="alert alert-warning">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <script type="text/javascript">
        window.location.href = '#register';
    </script>
@endif

{!! Form::open(['url' => 'register']) !!}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::text('first_name', old('first_name'), ['class' => 'form-control floating-label input-lg', 'placeholder' => 'Primeiro nome']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::text('last_name', null, ['class' => 'form-control floating-label input-lg', 'placeholder' => 'Último nome']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::text('cpf', null, ['class' => 'form-control floating-label input-lg', 'placeholder' => 'CPF']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::text('birthdate', null, ['class' => 'form-control floating-label input-lg', 'placeholder' => 'Data de nascimento']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::email('email', null, ['class' => 'form-control floating-label input-lg', 'placeholder' => 'Email']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::text('cep', null, ['class' => 'form-control floating-label input-lg', 'placeholder' => 'CEP']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::password('password', ['class' => 'form-control floating-label input-lg', 'placeholder' => 'Senha']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::password('password_confirmation', ['class' => 'form-control floating-label input-lg', 'placeholder' => 'Repita a senha']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::submit('Concluir cadastro', ['class' => 'btn btn-block btn-lg btn-primary']) !!}
        </div>
    </div>

{!! Form::close() !!}