@extends('layouts.AdminLayout')

@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content container-fluid">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Админ-панель</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="">
                            <div class="box-header">
                                <h2 class="box-title">Изменить пользователя</h2>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-6">


                                    {!! Form::open(['route'=>['users.update',$user->id], 'method'=>'PUT', 'files'=>'true']) !!}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Имя</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$user->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$user->email}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Пароль</label>
                                            <input type="password" class="form-control" id="exampleInputEmail1" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label>Роль</label>

                                            {{Form::select('role_id',
                                                                    $roles,
                                                                    null,
                                                                    [
                                                                        'placeholder' => $user->getRole(),
                                                                        'class' => 'form-control select2',
                                                                        'style' => 'width: 100%'
                                                                    ]
                                                          )
                                            }}
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Аватар</label>
                                            <input type="file" id="exampleInputEmail1" name="avatar">
                                            <br>
                                            <img src="{{$user->getAvatar()}}" width="200" alt="">
                                        </div>

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" {{$user->getStatusCheck()}} name="status" value="1">
                                                    Бан
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-warning">Изменить</button>
                                        </div>
                                    {!! Form::close() !!}


                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        По вопросам к главному администратору.
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->

        </section>
        <!-- /.content -->
    </div>
@endsection
