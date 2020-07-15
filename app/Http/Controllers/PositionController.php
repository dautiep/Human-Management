<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Chucdanh;
use App\Http\Requests\AddPositionRequest;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Chucdanh::orderBy('id', 'ASC')->get();
        return view('positions.index', ['positions' => $positions])
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPositionRequest $request)
    {
        $validated = $request->validated();
        $input = $request->all();
        $position = Chucdanh::create($input);
        $notification = array(
            'message' => 'Tạo Chức danh thành công', 
            'alert-type' => 'success'
            );
        return redirect()->route('positions.create')
                        ->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $position = Chucdanh::findOrFail($request->id_position);
        $this->validate($request, [
            'ma_chuc_danh' => 'required|unique:chucdanh,ma_chuc_danh,'.$request->id_position,
            'ten_chuc_danh' => 'required|unique:chucdanh,ten_chuc_danh,'.$request->id_position
            
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ma_chuc_danh' => 'Mã chức danh',
            'ten_chuc_danh' => 'Tên chức danh'
        ]);
        
        $input = $request->all();
        $position->update($input);
        $notification = array(
            'message' => 'Cập nhật Chức danh thành công', 
            'alert-type' => 'info'
            );
        return redirect()->route('positions.index')
                        ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $position = Chucdanh::findOrFail($request->id_position);
        $position->delete();
        $notification = array(
            'message' => 'Xóa Chức danh thành công', 
            'alert-type' => 'warning'
            );
        return redirect()->route('positions.index')
                        ->with($notification);
    }
}
