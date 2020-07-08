<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_Permission;
use DB;

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
        ]);
        $input = $request->all();
        $permissions = M_Permission::create($input);

        return redirect()->route('permissions.index')
                        ->with('success','permissions created successfully');
    }

    public function update(Request $request)
    {
        $permission = M_Permission::findOrFail($request->id_permission);
        $this->validate($request, [
            'name' => 'required|unique:permissions,name'
        ]);
        $input = $request->all();
        $permission->update($input);
        return redirect()->route('permissions.index')
                        ->with('success','Permission updated successfully');
    }

    public function destroy(Request $request)
    {
        $permission = M_Permission::findOrFail($request->id_permission);
        $permission->delete();
        return redirect()->route('permissions.index')
                        ->with('success','Permssion deleted successfully');
    }
}
