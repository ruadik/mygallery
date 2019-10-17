@extends('layouts.FrontLayout')

@section('content')
    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    {{$User[0]}}
                </h1>
                <h2 class="subtitle">
                    Все картинки автора
                </h2>
            </div>
        </div>
    </section>
    <section class="section main-content">
        <div class="container">
            <div class="columns  is-multiline">

                @foreach($photosUser as $photo)
                    <div class="column is-one-quarter">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <a href="{{route('front.photo', $photo->id)}}">
                                    <img src="{{$photo->getImage()}}" alt="Placeholder image">
                                </a>
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <p class="title is-5"><a href="{{route('front.photo', $photo->id)}}">{{$photo->title}}</a></p>

                                </div>
                                <div class="media-right">
                                    <p  class="is-size-7 media-right">Автор: {{$photo->user->name}}</p>
                                    <p  class="is-size-7 media-right">Категория: <a href="{{route('front.category.photos', $photo->category_id)}}">{{$photo->getCategoryTitle()}}</a></p>
                                    <p  class="is-size-7 media-right">Размер: {{$photo->size}}</p>
                                    <p  class="is-size-7 media-right">Добавлено: {{$photo->getDateFormatAttribute($photo->created_at)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <ul>
                    {{$photosUser->links()}}
                </ul>


            </div>
        </div>
    </section>
@endsection
