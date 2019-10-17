@extends('layouts.FrontLayout')

@section('content')
    <div class="container main-content">

        <div class="columns">
            <div class="column">
                <div class="tabs is-centered pt-100">
                    <ul>
                        <li class="is-active">
                            <a href="{{route('profile.user')}}">
                                <span class="icon is-small"><i class="fas fa-user"></i></span>
                                <span>Основная информация</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('security.user')}}">
                                <span class="icon is-small"><i class="fas fa-lock"></i></span>
                                <span>Безопасность</span>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="is-clearfix"></div>

                    {!! Form::open(['route'=>['profile.update', $user->getUserId()], 'method'=>'PUT', 'files'=>'true']) !!}
                        <div class="columns is-centered">
                    <div class="column is-half">
                        <div class="field">
                            <label class="label">{{__('Ваше имя')}}</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="text" value="{{$user->name}}" name="name">
                                @error('name')
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
                            <label class="label">{{__('Email')}}</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="text" value="{{$user->email}}" name="email">
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
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>



                        <div class="field">
                            <label class="label">{{__('Выберите автврку')}}</label>
                            <div class="file is-normal has-name">
                                <label class="file-label">
                                    <div class="form-group">

                                        <img src="{{$user->getAvatar()}}" width="200" alt="">
                                        <p>
                                            <input type="file" name="avatar" value="{{old('avatar') ? old('avatar') : null}}">
                                        </p>
                                    </div>
                                </label>
                                <div class="field">
                                </div>
                            </div>
                        </div>
                        @error('avatar')
                        <div class="info-box-content">
                            <div class="notification is-warning  ">
                                <ul>
                                    {{ $message }}
                                </ul>
                            </div>
                        </div>
                        @enderror



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
