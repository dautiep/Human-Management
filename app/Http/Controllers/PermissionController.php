<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_Permission;
use DB;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = M_Permission::orderBy('id','ASC')->paginate(10);    
        return view('permission.index', compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * 10);; 
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
        $user = M_Permission::findOrFail($request->id_permission);
        $this->validate($request, [
            'name' => 'required|unique:permissions,name'
        ]);
        $input = $request->all();
        $user->update($input);
        return redirect()->route('permissions.index')
                        ->with('success','Permission updated successfully');
    }

    public function destroy(Request $request)
    {
        $user = M_Permission::findOrFail($request->id_permission);
        $user->delete();
        return redirect()->route('permissions.index')
                        ->with('success','Permssion deleted successfully');
    }
}
