@extends('pages.layout.mainlayout')

<link rel="stylesheet" href="../public/css/custom.css">

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-8">
        <h1>USER DETAIL</h1>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-success" href="{{route('users.index')}}"> Back</a>
      </div>
      <div class="col-sm-2">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">users table</li>
          <li class="breadcrumb-item active">user detail</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>




<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên tài khoản: </strong>
            {{ $user->username }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email: </strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Danh số: </strong>
            {{ $user->danhso }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Họ Tên: </strong>
            {{ $user->hoten }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Avatar: </strong>
            <img src="{{$user->avatar}}" width="150px" class="img-circle">
        </div>
    </div>
</div>
@endsection