@extends('layouts.app')
@section('content')
<!-- general form elements -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tạo vai trò</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Tạo vai trò</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h2 class="card-title">Tạo mới vai trò</h2>
                <div class="card-tools">
                <a class="btn btn-success" href="{{ route('roles.index') }}"><i class="fas fa-angle-double-left"></i> Trở lại danh sách</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="card-body">

            <div class="tab-pane" id="settings">
                <div class="form-horizontal">
                    <div class="form-group">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Lỗi!</strong> Dữ liệu bạn nhập không hợp lệ.<br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-md-2 col-form-label">Tên</label>
                        <div class="col-md-10">
                            {!! Form::text('name', null, array('placeholder' => 'Tên','class' => 'form-control')) !!}

                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="inputPermission" class="col-md-2 col-form-label">Quyền</label>
                        <div class="col-md-10">

                            <div class="row">
                                <?php
                                    $abc ="";
                                    $len = count($permission);
                                ?>
                                @foreach($permission as $key => $value)

                                    <?php

                                        if ($key === 0) {
                                            echo '<div class="col-lg-4">';
                                        }

                                        if ($abc != substr($value->name,0,strpos($value->name,"-")) && $key === 0){
                                            $abc = substr($value->name,0,strpos($value->name,"-"));

                                            echo '<label>'.$abc. '</label><div class="block">';

                                        }  else if($abc != substr($value->name,0,strpos($value->name,"-")) && $key !== 0){
                                            $abc = substr($value->name,0,strpos($value->name,"-"));
                                            echo '</div></div><div class="col-lg-4">';
                                            echo '<label>'.$abc. '</label><div class="block">';
                                        }

                                    ?>
                                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}
                                    <br />
                                    <?php
                                        if ($key === $len-1) {
                                            echo '</div></div>';
                                        }
                                    ?>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.tab-pane -->

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.card -->
</div>
@endsection
