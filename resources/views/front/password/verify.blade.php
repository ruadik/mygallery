@extends('layouts.FrontLayout')

@section('content')
    <section class="hero is-dark">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Ваш E-mail не верефицирован.
            </h1>
            <h2 class="subtitle">
                Пройдите по ссылке письмо придет вам на почту.
            </h2>
        </div>
    </div>
</section>
    <div class="container main-content">
    <div class="columns">
        <div class="column"></div>
        <div class="column is-quarter auth-form">

            <div class="card-body">
                @if (session('resent'))
                    <div class="notification is-primary" role="alert">
                        <strong>{{ __('Ссылка на подтверждение E-mail отправлена, проверьте почту.') }}</strong>
                    </div>
                @else
                    <div class="notification is-primary" role="alert">
                        <strong>{{ __('Проверьте почту.') }}</strong>
                    </div>
                @endif
                {{ __('Если вы не получили письмо для повторной отправки') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <p class="control">
                        <button class="button is-info">
                                      <span class="icon">
                                        <i class="fas fa-envelope"></i>
                                      </span>
                            <span>Нажмите на кнопку</span>
                        </button>
                    </p>

                </form>
            </div>
            <div class="field">
{{--                <p>Нет аккаунта? <b><a href="register.html">Регистрация</a></b></p>--}}
                <p>Забыли пароль? <b><a href="{{route('password.request')}}">Восстановление пароля</a></b></p>
            </div>
        </div>
        <div class="column"></div>
    </div>
</div>
@endsection