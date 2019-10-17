@extends('layouts.FrontLayout')

@section('content')
    <div class="container main-content">

        <div class="columns">
            <div class="column">
                <div class="tabs is-centered pt-100">
                    <ul>
                        <li>
                            <a href="{{route('profile.user')}}">
                                <span class="icon is-small"><i class="fas fa-user"></i></span>
                                <span>Основная информация</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a href="{{route('security.user')}}">
                                <span class="icon is-small"><i class="fas fa-lock"></i></span>
                                <span>Безопасность</span>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="is-clearfix"></div>
                {!! Form::open(['route'=>['security.update', $user->getUserId()], 'method'=>'PUT']) !!}
                    <div class="columns is-centered">
                    <div class="column is-half">
                        <div class="field">
                            <label class="label">{{__('Текущий пароль')}}</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="password" name="current_password">
                                @error('current_password')
                                <div class="info-box-content">
                                    <div class="notification is-warning  ">
                                        <ul>
                                            {{ $message }}
                                        </ul>
                                    </div>
                                </div>
                                @enderror
                                <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">{{__('Новый пароль')}}</label>
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
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Подтвердите пароль</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="password" name="password_confirmation">
                                <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                            </div>
                        </div>

                        <div class="control">
                            <button class="button is-link">Обновить</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection