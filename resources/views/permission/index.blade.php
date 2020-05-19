
@extends('pages.layout.mainlayout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permissions</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Guard_name</th>
   
   <th width="280px">Action</th>
 </tr>

 @foreach( $permissions as  $p)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $p->name }}</td>
    <td>{{ $p->guard_name }}</td>
    <td>
        <button class="btn btn-primary" data-permissionid={{$p->id}} data-permissionname={{$p->name}}
            data-toggle="modal" data-target="#editPermissionModal">Edit
        </button>
        <button class="btn btn-danger"  data-permissionid={{$p->id}} data-toggle="modal" data-target="#deletePermissionModal">Delete</button>
    </td>
  </tr>

 @endforeach
 <!-- Modal Edit -->
<div class="modal modal-danger fade" id="editPermissionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="myModalLabel">Sửa permission</h4>
        </div>
        <form action="{{ route('permissions.update', 'test') }}" method="post">
            {{method_field('patch')}}
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal-body">
            <div class="form-group">
                <label>Tên Permission </label>
                {!! Form::text('name', $p->name, array('placeholder' => 'Permission','class' => 'form-control', 'id' => 'permission_name')) !!}
            </div>
            <input type="hidden" name="id_permission" id="permission_id" value="">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-warning" >Lưu cập nhật</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End Modal Edit-->

 <!-- Modal Delete -->
 <div class="modal modal-danger fade" id="deletePermissionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
        </div>
        <form action="{{route('permissions.destroy', 'test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-body">
        <p class="text-center">
            Bạn có chắc chắn muốn xóa quyền này không? 
        </p>
            <input type="hidden" name="id_permission" id="permission_id" value="">

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

</table>
{!! $permissions->links()!!}






@endsection