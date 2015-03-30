@extends('master', ['title' => 'Registrace', 'bodyClasses' => 'login-body-bg'])

@section('content')

    @include('partials.header')

    <div id="login">
        <div class="content-wrapper">

            <div class="login-errors-wrapper">
                @include('partials.errors')
            </div>

            <div class="login-box">

                <ul class="login-tabs">
                    <li class="tab"><a href="{{ route('user.get.login') }}">Přihlášení</a></li>
                    <li class="tab active"><a href="{{ route('user.get.registration') }}">Registrace</a></li>
                </ul>

                <div class="clearfix"></div>

                <div class="login-box-content">

                    {!! Form::open(['route' => 'user.post.registration']) !!}

                    <div class="form-group {{ $errors->has('username') ? 'error-input' : false }}">
                        {!! Form::text('username', @$username, ['class' => 'form-control', 'placeholder' => 'Uživatelské jméno']) !!}
                    </div>

                    <div class="form-group {{ $errors->has('full_name') ? 'error-input' : false }}">
                        {!! Form::text('full_name', @$full_name, ['class' => 'form-control', 'placeholder' => 'Celé jméno']) !!}
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'error-input' : false }}">
                        {!! Form::text('email', @$email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    </div>

                    <div class="form-group phone {{ $errors->has('phone') ? 'error-input' : false }}">
                        <div class="input-group">
                            <div class="input-group-addon">+420</div>
                            {!! Form::text('phone', @$phone, ['class' => 'form-control', 'placeholder' => 'Telefonní číslo']) !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'error-input' : false }}">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Heslo']) !!}
                    </div>

                    {!! Form::submit('Registrovat se', ['class' => 'btn btn-primary btn-block text-uppercase']) !!}

                    {!! Form::close() !!}

                </div>

            </div>

        </div>
    </div>

    @include('partials.footer')

@endsection