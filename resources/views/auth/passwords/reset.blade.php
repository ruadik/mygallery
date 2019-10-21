@extends('layouts.FrontLayout')

@section('content')
    <section class="hero is-dark">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Восстановление пароля.
                </h1>
                <h2 class="subtitle">
                    Введите новый пароль.
                </h2>
            </div>
        </div>
    </section>
    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-quarter auth-form">


                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">
                        <label class="label">{{ __('E-Mail Address') }}</label>
                        <div class="control has-icons-left has-icons-right">
                            <input id="email" type="email" class="input" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>

                            @error('email')
                                <div class="info-box-content">
                                    <div class="notification is-warning">
                                        <ul>
                                            {{ $message }}
                                        </ul>
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="password" class="label">{{ __('Password') }}</label>

                        <div class="control has-icons-left has-icons-right">
                            <input id="password" type="password" class="input" name="password" required autocomplete="new-password">

                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>

                            @error('password')
                            <div class="info-box-content">
                                <div class="notification is-warning">
                                    <ul>
                                        {{ $message }}
                                    </ul>
                                </div>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

                        <div class="control has-icons-left has-icons-right">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">

                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>

                            </div>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">{{ __('Reset Password') }}</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="column"></div>
        </div>
    </div>
@endsection