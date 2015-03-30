@extends('master', ['title' => 'Přihlášení', 'bodyClasses' => 'login-body-bg'])

@section('content')

    @include('partials.header')

    <div id="login">
        <div class="content-wrapper">

            <div class="login-box">

                <div class="password-sent-box-content">

                    <h2>Úspěšně odesláno</h2>

                    <p>Na váš registrační email jsme vám odeslali instrukce pro obnovu hesla k účtu.</p>

                    <a href="{{ route('login') }}" class="btn btn-gray btn-block text-uppercase">Zpět na přihlášení</a>

                </div>

                <div class="login-box-forgot-password">

                    <a class="label-link-without-js" href="#">Email mi nepřišel</a>

                </div>

            </div>

        </div>
    </div>

    @include('partials.footer')

@endsection