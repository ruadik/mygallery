
    <div class="container">
        <nav class="navbar is-transparent">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{route('FrontHome')}}">
                    <img src="/img/logo.png">
                </a>
                <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="navbarExampleTransparentExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{route('FrontHome')}}">
                        Главная
                    </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Категории
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            @foreach($categories as $category)
                            <a class="navbar-item" href="{{route('front.category.photos', $category->slug)}}">
                                {{$category->title}}
                            </a>
                            @endforeach

                        </div>
                    </div>


                </div>

                @guest
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="field is-grouped">
                                <p class="control">
                                    <a class="button is-link" href="{{route('login')}}">
                                      <span class="icon">
                                        <i class="fas fa-user"></i>
                                      </span>
                                        <span>Войти</span>
                                    </a>
                                </p>
                                <p class="control">
                                    <a class="button is-primary" href="{{route('register')}}">
                                      <span class="icon">
                                        <i class="fas fa-address-book"></i>
                                      </span>
                                        <span>Зарегистрироваться</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endguest

{{--                @if(Auth::check() && Auth::user()->email_verified_at != null)--}}
                @if(Auth::check())
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="field is-grouped">
                                <a class="navbar-item" href="{{route('images.index')}}">
                                    <span class="icon has-text-grey-dark">
                                          <ion-icon size="large" name="images"></ion-icon>
                                    </span>  Мои картинки
                                </a>
                                <a class="navbar-item" href="{{route('images.create')}}">
                                    <span class="icon has-text-grey-dark">
                                          <ion-icon size="large" name="download"></ion-icon>
                                    </span>  Загрузить картинку
                                </a>

                                <div class="navbar-start">
                                    <div class="navbar-item has-dropdown is-hoverable">
                                        <a class="navbar-link">
                                            <figure class="image is-32x32">
                                                <img class="is-rounded" src="{{$userName->getAvatar()}}">
                                            </figure>
                                            <div class="account control">
                                                <p>
                                                    <b>{{$userName->name}}</b>
                                                </p>
                                            </div>
                                        </a>
                                        <div class="navbar-dropdown is-boxed">
                                            <a class="navbar-item" href="{{route('profile.user')}}">
                                                <span class="icon has-text-grey-dark">
                                                    <ion-icon size="medium" name="person"></ion-icon>
                                                </span> Профиль
                                            </a>
                                            <a class="navbar-item" href="{{route('security.user')}}">
                                                <span class="icon has-text-grey-dark">
                                                  <ion-icon size="medium" name="lock"></ion-icon>
                                                </span> Безопсность
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <form  action="{{route('logout')}}" method="Post">
                                    @csrf
                                    <button class="button">
                                        <span class="icon has-text-grey-dark">
                                                  <ion-icon size="large 3em" name="exit"></ion-icon>
                                        </span>
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                @endif

{{--                @if(Auth::check() && Auth::user()->email_verified_at == null)--}}
{{--                    <div class="navbar-end">--}}
{{--                    <div class="navbar-item">--}}




{{--                        <div class="navbar-end">--}}
{{--                            <div class="navbar-item">--}}
{{--                                <div class="field is-grouped">--}}
{{--                                    <p class="control">--}}
{{--                                        <a class="button is-link" href="{{route('redirect.login')}}">--}}
{{--                                      <span class="icon">--}}
{{--                                        <i class="fas fa-user"></i>--}}
{{--                                      </span>--}}
{{--                                            <span>Войти</span>--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                    <p class="control">--}}
{{--                                        <a class="button is-primary" href="{{route('redirect.login')}}">--}}
{{--                                      <span class="icon">--}}
{{--                                        <i class="fas fa-address-book"></i>--}}
{{--                                      </span>--}}
{{--                                            <span>Зарегистрироваться</span>--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                            <form  action="{{route('logout')}}" method="Post">--}}
{{--                            @csrf--}}
{{--                            <p class="control">--}}
{{--                                <button class="button is-info">--}}
{{--                                      <span class="icon">--}}
{{--                                        <i class="fas fa-address-book"></i>--}}
{{--                                      </span>--}}
{{--                                    <span>Войти</span>--}}
{{--                                </button>--}}
{{--                            </p>--}}
{{--                        </form>--}}

{{--                        <div class="field is-grouped">--}}
{{--                            <form  action="{{route('logout')}}" method="Post">--}}
{{--                                @csrf--}}
{{--                                <p class="control">--}}
{{--                                    <button class="button is-info">--}}
{{--                                      <span class="icon">--}}
{{--                                        <i class="fas fa-address-book"></i>--}}
{{--                                      </span>--}}
{{--                                        <span>Регистрация</span>--}}
{{--                                    </button>--}}
{{--                                </p>--}}
{{--                            </form>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endif--}}

            </div>
        </nav>
    </div>
