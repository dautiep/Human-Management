<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Trinhdovanhoa;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Trinhdovanhoa::orderBy('id', 'ASC')->get();
        return view('education_levels.index', ['levels' => $levels])
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education_levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ten_trinhdovanhoa' => 'required|unique:trinhdovanhoa,ten_trinhdovanhoa,'
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_trinhdovanhoa' => 'Tên trình độ văn hóa',
        ]);
        $input = $request->all();
        $level = Trinhdovanhoa::create($input);
        $notification = array(
            'message' => 'Tạo trình độ văn hóa thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('education-levels.index')
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
        $level = Trinhdovanhoa::findOrFail($request->id_level);
        $this->validate($request, [
            'ten_trinhdovanhoa' => 'required|unique:trinhdovanhoa,ten_trinhdovanhoa,'.$request->id_level,
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_trinhdovanhoa' => 'Tên trình độ văn hóa',
        ]);
        $input = $request->all();
        $level->update($input);
        $notification = array(
            'message' => 'Cập nhật Trình độ văn hóa thành công', 
            'alert-type' => 'info'
            );
        return redirect()->route('education-levels.index')
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
        $level = Trinhdovanhoa::findOrFail($request->id_level);
        $level->delete();
        $notification = array(
            'message' => 'Xóa Trình độ văn hóa thành công', 
            'alert-type' => 'warning'
            );
        return redirect()->route('education-levels.index')
                        ->with($notification);
    }
}
