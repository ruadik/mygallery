@extends('admin.layout')

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
                                <h2 class="box-title">Добавить изображение</h2>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-6">

                                    {!! Form::open(['route'=>'photos.store', 'files'=>'True']) !!}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Название</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{old('title')}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Краткое описание</label>
                                            <textarea class="form-control" name="description" >{{old('description')}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Категория</label>
                                            {{Form::select(
                                                            'category_id',
                                                            $categories,
                                                            null,
                                                                [
                                                                     'placeholder' => '',
                                                                     'class' => 'orm-control select2',
                                                                     'style' => 'width: 100%'
                                                                ]
                                                            )
                                            }}
                                        </div>

                                        <div class="form-group">
                                            <label>Изображение</label>
                                            <input type="file" name="image" value="{{old('image')}}">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success">Добавить</button>
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
