@extends('pages.layout.mainlayout')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-8">
        <h1>USERS TABLE</h1>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-success" href="{{route('users.create')}}"> Create New User</a>
      </div>
      <div class="col-sm-2">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">users table</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
  <p>{{ $message }}</p>
  </div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">  
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên tài khoản</th>
                <th>Email</th>
                <th>Danh số</th>
                <th>Avatar</th>
                <th>Quyền</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $datas)
              <tr>
                <td>{{++$i}}</td>
                <td>{{$datas->username}}</td>
                <td>{{$datas->email}}</td>
                <td>{{$datas->danhso}}</td>
                <td><img src="{{$datas->avatar}}" width="50px" class="img-circle"></td>
                <td>
                  @if(!empty($datas->getRoleNames()))
                    @foreach($datas->getRoleNames() as $v)
                      <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                  @endif 
                </td>
                                  
                <td>
                  <a class="btn btn-info" href="{{ route('users.show',$datas->id) }}">Show</a>
                  <button class="btn btn-primary" data-userid={{$datas->id}} data-username="{{$datas->username}}"
                    data-email={{$datas->email}} data-danhso={{$datas->danhso}} data-hoten="{{$datas->hoten}}"
                    data-toggle="modal" data-target="#editModal">Edit
                  </button>
                    <button class="btn btn-danger"  data-userid={{$datas->id}} data-toggle="modal" data-target="#deleteModal">Delete</button>
                </td>
              </tr>

              
              @endforeach
              <!-- Modal Edit -->
              <div class="modal modal-danger fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                      <h4 class="modal-title text-center" id="myModalLabel">Sửa thông tin người dùng</h4>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('users.update', 'test') }}" method="post">
                        {{method_field('patch')}}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Tên tài khoản: </label>
                          {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control', 'id' => 'user_username')) !!}
                        </div>
                        <div class="form-group">
                          <label>Email:</label>
                          {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'id' => 'user_email')) !!}
                        </div>
                        <div class="form-group">
                          <label>Danh số:</label>
                          {!! Form::text('danhso', null, array('placeholder' => 'danhso','class' => 'form-control', 'id' => 'user_danhso')) !!}
                        </div>
                        <div class="form-group">
                          <label>Họ tên:</label>
                          {!! Form::text('hoten', null, array('placeholder' => 'Full Name','class' => 'form-control', 'id' => 'user_hoten')) !!}
                        </div>
                        <div class="form-group">
                          <label>Mật khẩu:</label>
                          {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                          <label>Nhập lại mật khẩu:</label>
                          {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                          <label>Avatar:</label>
                          <input type="file" class="form-control" name="avatar" id="user_avatar" value="{{old('avatar')}}">
                        </div>
                        <div class="form-group">
                          <strong>Role: </strong>
                          <select id="roles" class="form-control" multiple name="roles[]">
                            @foreach($roles as $role)
                              <option value="{{$role}}">{{$role}}</option>
                            @endforeach
                          </select>  
                        </div>
                        

                        <input type="hidden" name="id_user" id="user_id" value="">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-warning" data-target="#myModal<?php echo $i; ?>">Lưu cập nhật</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Modal Edit-->

                <!-- Modal Delete -->
                <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                        <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                      </div>
                      <form action="{{route('users.destroy', 'test')}}" method="post">
                          {{method_field('delete')}}
                          {{csrf_field()}}
                        <div class="modal-body">
                        <p class="text-center">
                          Bạn có chắc chắn muốn xóa tài khoản này không? 
                        </p>
                            <input type="hidden" name="id_user" id="user_id" value="">
              
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                          <button type="submit" class="btn btn-warning">Xóa ngay</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modal delete-->
              </tbody>
          </table>
          {!! $data->links()!!}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  @endsection