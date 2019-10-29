@extends('layouts.FrontLayout')

@section('content')

    <section class="hero is-info is-medium">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    {{$photo->title}}
                </h1>
                <h2 class="subtitle">
                    {!!$photo->description!!}
                </h2>
            </div>
        </div>
    </section>

    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-half auth-form">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{$photo->getImage()}}" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="{{$photo->user->getAvatar()}}" alt="Placeholder image">
                                </figure>
                            </div>
                            <p class="title is-4">
                                Добавил: <a href="{{route('front.user.photos', $photo->user->id)}}">{{$photo->user->name}}</a>
                            </p>
                        </div>

                        <div class="content">
                            {!!$photo->description!!}
                            <br>
                            <time datetime="2016-1-1" class="is-size-6 is-pulled-left">Добавлено: {{$photo->getDateFormatAttribute($photo->created_at)}}</time>
                            <a href="{{route('front.download.photo', $photo->id)}}" class="button is-info is-pulled-right">Скачать</a>
                            <div class="is-clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="column"></div>
        </div>

        <hr>

        <div class="columns">
            <div class="column">
                <h1 class="title">Другие фотографии от <a href="{{route('front.user.photos', $photo->user->id)}}">{{$photo->user->name}}</a></h1>
            </div>
        </div>

        <div class="columns section">

            @foreach($userPhotos as $userPhoto)
                <div class="column is-one-quarter">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <a href="{{route('front.photo', $userPhoto->slug)}}">
                                <img src="{{$userPhoto->getImgSmall()}}" alt="Placeholder image">
                            </a>
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <p class="title is-5"><a href="{{route('front.photo', $userPhoto->id)}}">{{$userPhoto->title}}</a></p>
                            </div>
                            <div class="media-right">
                                <p  class="is-size-7 media-right">Категория: <a href="{{route('front.category.photos', $userPhoto->category_id)}}">{{$userPhoto->getCategoryTitle()}}</a></p>
                                <p  class="is-size-7 media-right">Размер: {{$userPhoto->size}}</p>
                                <p  class="is-size-7 media-right">Добавлено: {{$userPhoto->getDateFormatAttribute($photo->created_at)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
