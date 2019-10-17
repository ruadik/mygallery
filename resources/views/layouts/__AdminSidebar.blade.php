<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{$userName->getAvatar()}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$userName->name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Навигация</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{route('photos.index')}}"><i class="fa fa-image"></i> <span>Все картинки</span></a></li>
            <li><a href="{{route('category.index')}}"><i class="fa fa-list"></i> <span>Категории</span></a></li>
            <li><a href="{{route('users.index')}}"><i class="fa fa-group"></i> <span>Пользователи</span>
                    <span class="pull-right-container">
                        <small class="label pull-left bg-green">{{$countBun}}</small>
                        <small class="label pull-right bg-red">{{$countUnBun}}</small>
                    </span>
                </a>
            </li>
            <li><a href="{{route('Admin.logout')}}"><i class="fa fa-sign-out"></i> <span>Выход</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>