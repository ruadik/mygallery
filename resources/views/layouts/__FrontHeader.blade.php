
    <div class="container">
        <nav class="navbar is-transparent">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{route('FrontHome')}}">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
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
                            <a class="navbar-item" href="{{route('front.category.photos', $category->id)}}">
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
                @else
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="field is-grouped">
                                <p class="control">
                                    <p>
                                        <a class="navbar-item" href="{{route('images.index')}}">
                                            Мои картинки
                                        </a>
                                    </p>
                                    <a class="button is-primary" href="{{route('images.create')}}">
                                      <span class="icon">
                                        <i class="fas fa-upload"></i>
                                      </span>
                                        <span>Загрузить картинку</span>
                                    </a>

                                    </p>
                                        <div class="account control">
                                        <p>
                                        Здравствуйте, <b>{{\Illuminate\Support\Facades\Auth::user()->name}}</b>
                                    </p>
                                </div>
                                <p class="control">
                                    <a class="button is-info" href="{{route('profile.user')}}">
                                      <span class="icon">
                                        <i class="fas fa-user"></i>
                                      </span>
                                        <span>Профиль</span>
                                    </a>
                                </p>
                                <p class="control">
                                    <form  action="{{route('logout')}}" method="Post">
                                    @csrf
                                        <button class="button is-dark">
                                          <span class="icon">
                                            <i class="fas fa-window-close"></i>
                                          </span>
                                            <span>Выйти</span>
                                        </button>
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>
        </nav>
    </div>
