@extends('layouts.AdminLayout')

@section('content')

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content container-fluid">

        @include('flashAdminMassage')
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
                                <h2 class="box-title">Все категории</h2>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <a href="{{route('category.create')}}" class="btn btn-success btn-lg">Добавить</a> <br> <br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Название</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)
                                        <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>

                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <a href="{{route('category.edit', $category->slug)}}" class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                {!! Form::open(['route'=>['category.destroy',$category->id], 'method'=>'DELETE']) !!}
                                                    <button class="btn btn-danger" onclick="return confirm('Вы уверены?');">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                {!! Form::close() !!}

                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Название</th>
                                        <th>Действия</th>
                                    </tr>
                                    </tfoot>
                                </table>
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
