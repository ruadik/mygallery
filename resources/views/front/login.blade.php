@extends('layouts.FrontLayout')

@section('content')
    <section class="hero is-dark">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Поделитесь красочными снимками!
                </h1>
                <h2 class="subtitle">
                    Вход в систему.
                </h2>
            </div>
        </div>
    </section>

    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-quarter auth-form">

                <div class="field">
                    <label class="label">{{__('Email')}}</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="email" name="email">  <!-- is-danger -->
                        @error('email')
                            <div class="info-box-content">
                                <div class="notification is-warning  ">
                                    <ul>
                                        {{ $message }}
                                    </ul>
                                </div>
                            </div>
                        @enderror
                        <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                        </span>
                        <!-- <span class="icon is-small is-right">
                          <i class="fas fa-exclamation-triangle"></i>
                        </span> -->
                    </div>
                    <!-- <p class="help is-danger">This email is invalid</p> -->
                </div>

                <div class="field">
                    <label class="label">{{__('Пароль')}}</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" name="password">
                        @error('password')
                        <div class="info-box-content">
                            <div class="notification is-warning  ">
                                <ul>
                                    {{ $message }}
                                </ul>
                            </div>
                        </div>
                        @enderror
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            Запомнить меня
                        </label>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Войти</button>
                    </div>
                    <div class="control">
                        <a class="button is-text" href="{{route('FrontHome')}}">Отмена</a>
                    </div>
                </div>
                <div class="field">
                    <p>Забыли пароль? <b><a href="password-reset.html">Восстановление пароля</a></b></p>
                    <p>Не пришло письмо подтверждения? <b><a href="email-verification.html">Переотправить</a></b></p>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
