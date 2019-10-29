@extends('layouts.FrontLayout')

@section('content')
    <section class="hero is-warning">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Новые события - новые фотографии!
                </h1>
                <h2 class="subtitle">
                    Заполните форму и пополните вашу галерею.
                </h2>
            </div>
        </div>
    </section>
    <div class="container main-content">


        {!! Form::open(['route'=>'images.store', 'method'=>'POST', 'files'=>'TRUE']) !!}
            <div class="columns">
                <div class="column"></div>
                <div class="column is-quarter auth-form">

                    <div class="field">
                        <label class="label">{{__('Название')}}</label>
                        <div class="control">
                            <input class="input" type="text" name="title" value="{{old('title')}}">
                            @error('title')
                            <div class="info-box-content">
                                <div class="notification is-warning  ">
                                    <ul>
                                        {{ $message }}
                                    </ul>
                                </div>
                            </div>
                            @enderror


                        </div>
                    </div>

                    <div class="field">
                        <label class="label">{{__('Краткое описание')}}</label>
                        <div class="control">
                            <textarea class="textarea" name="description">{{old('description')}}</textarea>

                            @error('description')
                            <div class="info-box-content">
                                <div class="notification is-warning  ">
                                    <ul>
                                        {{ $message }}
                                    </ul>
                                </div>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">{{__('Выберите категорию')}}</label>
                        <div class="control">
                            <div class="select">
                                {{Form::select(
                                                'category_id',
                                                $categories,
                                                old('category_id') ? old('category_id') : null,
                                                    [
                                                         'placeholder' => '',
                                                         'style' => 'width: 100%'
                                                    ]
                                                )
                                }}
                            </div>

                        </div>
                    </div>

                    <div class="field">
                        @error('category_id')
                        <div class="info-box-content">
                            <div class="notification is-warning  ">
                                <ul>
                                    {{ $message }}
                                </ul>
                            </div>
                        </div>
                        @enderror
                    </div>


                    <div class="field">
                        <label class="label">{{__('Выберите картинку')}}</label>
                        <div class="file is-normal has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" name="image">
                                    <p>
                                        <input type="file" name="image">
                                    </p>
                            </label>
                            <div class="field">
                            </div>

                        </div>
                    </div>
                    @error('image')
                    <div class="info-box-content">
                        <div class="notification is-warning  ">
                            <ul>
                                {{ $message }}
                            </ul>
                        </div>
                    </div>
                    @enderror

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-success is-large">Загрузить</button>
                        </div>
                    </div>
                </div>
                <div class="column"></div>
            </div>
        {!! Form::close() !!}


    </div>
@endsection
