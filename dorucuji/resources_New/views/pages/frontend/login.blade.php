@extends('master', ['title' => 'Přihlášení', 'bodyClasses' => 'login-body-bg'])

@section('content')

    @include('partials.header')

    <div id="login">
        <div class="content-wrapper">

            <div class="login-errors-wrapper">
                @include('partials.errors')
            </div>


            <div class="login-box {{ Session::get('error-login-effect') }}">

                <ul class="login-tabs">
                    <li class="tab active"><a href="{{ route('user.get.login') }}">Přihlášení</a></li>
                    <li class="tab"><a href="{{ route('user.get.registration') }}">Registrace</a></li>
                </ul>

                <div class="clearfix"></div>

                <div class="login-box-content">

                    {!! Form::open(['route' => 'user.post.login']) !!}

                        {{ Session::get('error-login') }}

                        <div class="form-group">
                            {!! Form::text('username', @$username, ['class' => 'form-control', 'placeholder' => 'Uživatelské jméno']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Heslo']) !!}
                        </div>

                        {!! Form::submit('Přihlásit se', ['class' => 'btn btn-primary btn-block text-uppercase']) !!}

                    {!! Form::close() !!}

                </div>

                <div class="login-box-forgot-password">

                    <a class="label-link" href="#">Zapomenuté heslo</a>

                    <div class="hidden-form">

                        {!! Form::open(['route' => 'user.post.lost-password']) !!}

                        <div class="form-group {{ $errors->has('email') ? 'error-input' : false }}">
                            {!! Form::text('email', @$email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        </div>

                        {!! Form::submit('Odeslat heslo', ['class' => 'btn btn-gray btn-block text-uppercase']) !!}

                        {!! Form::close() !!}

                    </div>
                    
                </div>

            </div>

        </div>
    </div>

    @include('partials.footer')

@endsection