@extends('layouts.FrontLayout')

@section('content')
    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Обновление события - Обновление фотографии!
                </h1>
                <h2 class="subtitle">
                    Обновление инфомации о фотографии.
                </h2>
            </div>
        </div>
    </section>

    <div class="container main-content">


        {!! Form::open(['route'=>['images.update', $photo->id], 'method'=>'Put', 'files'=>'TRUE']) !!}
        <div class="columns">
            <div class="column"></div>
            <div class="column is-quarter auth-form">

                <div class="field">
                    <label class="label">{{__('Название')}}</label>
                    <div class="control">
                        <input class="input" type="text" name="title" value="{{$photo->title}}">
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
                        <textarea class="textarea" name="description">{{$photo->description}}</textarea>

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
                                            null,
                                                [
                                                     'placeholder' => $photo->getCategoryTitle(),
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
                            <div class="form-group">

                                <img src="{{$photo->getImgSmall()}}" height="100" width="140" alt="">
                                <p>
                                    <input type="file" name="image">
                                </p>
                            </div>
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
                        <button class="button is-success is-large">Обновить</button>
                    </div>
                </div>
            </div>
            <div class="column"></div>
        </div>
        {!! Form::close() !!}


    </div>
@endsection
