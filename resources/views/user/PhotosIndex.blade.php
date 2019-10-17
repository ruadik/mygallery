@extends('layouts.FrontLayout')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Моя галерея
                </h1>
                <h2 class="subtitle">
                    Загруженные вами картинки
                </h2>
            </div>
        </div>
    </section>
    <section class="section main-content">
        <div class="container">
            <div class="columns  is-multiline">


                @foreach($photos as $photo)
                    <div class="column is-one-quarter">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <a href="photo.html">
                                    <img src="{{$photo->getImage()}}" alt="Placeholder image">
                                </a>
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">

                                <div class="media-left center">
                                    <p class="title is-5"><a href="category.html">{{$photo->title}}</a></p>

                                    <div class="field is-grouped is-grouped-right">
                                        <p class="control">
                                            <a href="{{route('images.edit', $photo->id)}}" class="button is-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </p>
                                        <p class="control">
                                            {!! Form::open(['route'=>['images.destroy', $photo->id], 'method'=>'delete']) !!}
                                            <button class="button is-danger" onclick="return confirm('Вы уверены?');">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </p>
                                    </div>
                                </div>

                                <div class="media-right">
                                    <p> <div class="is-size-7">Категоря: {{$photo->getCategoryTitle()}}</div></p>
                                    <p> <div class="is-size-7">Размер: {{$photo->size}}</div> </p>
                                    <p> <div class="is-size-7">Добавлено: {{$photo->getDateFormatAttribute($photo->created_at)}}</div></p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <ul>
                {{ $photos->links() }}
            </ul>
        </div>
    </section>

@endsection
