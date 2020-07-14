<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\M_Permission;

class PermissionController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:permission-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        $permissions = M_Permission::all();    
        return view('permission.index', compact('permissions'))
            ->with('i'); 
    }
    public function create()
    {
        $permissions = M_Permission::pluck('name','name')->all(); //lay tat ca ten o cot name
        return view('permission.create',compact('permissions'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name'
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'name' => 'Tên quyền',
        ] );
        $input = $request->all();

        $permissions = M_Permission::create($input);
        $notification = array(
            'message' => 'Tạo Permission thành công', 
            'alert-type' => 'success'
            );

        return redirect()->back()
                        ->with($notification);
        
    }

    public function update(Request $request)
    {
        $permission = M_Permission::findOrFail($request->id_permission);
        $this->validate($request, [
            'name' => 'required|unique:permissions,name'
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'name' => 'Tên quyền',
        ] );
        $input = $request->all();
        
        $permission->update($input);
        $notification = array(
            'message' => 'Cập nhật Permission thành công', 
            'alert-type' => 'info'
          );
        return redirect()->route('permissions.index')
                        ->with($notification);
    }

    public function destroy(Request $request)
    {
        $permission = M_Permission::findOrFail($request->id_permission);
        $permission->delete();
        $notification = array(
            'message' => 'Xóa Permission thành công', 
            'alert-type' => 'warning'
          );
        return redirect()->route('permissions.index')
                        ->with($notification);
    }
}
