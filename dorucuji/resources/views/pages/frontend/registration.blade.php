@extends('master', ['title' => 'Registrace', 'bodyClasses' => 'login-body-bg'])

@section('content')

    @include('partials.header')

    <div id="login">
        <div class="content-wrapper">

            <div class="login-box">

                <ul class="login-tabs">
                    <li class="tab"><a href="{{ route('login') }}">Přihlášení</a></li>
                    <li class="tab active"><a href="{{ route('registration') }}">Registrace</a></li>
                </ul>

                <div class="clearfix"></div>

                <div class="login-box-content">

                    {!! Form::open(['route' => null]) !!}

                    <div class="form-group">
                        {!! Form::text('username', @$username, ['class' => 'form-control', 'placeholder' => 'Uživatelské jméno']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::text('email', @$email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::text('phone', @$phone, ['class' => 'form-control', 'placeholder' => 'Telefonní číslo']) !!}
                    </div>

                    <div class="form-group">
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