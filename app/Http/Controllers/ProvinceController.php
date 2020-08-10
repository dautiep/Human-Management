<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tinh;
use App\Imports\ProvinceImport;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Tinh::orderBy('id', 'ASC')->get();
        return view('provinces.index', ['provinces' => $provinces])
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinces.create');
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
            'ma_tinh' => 'required|unique:tinh,ma_tinh,',
            'ten_tinh' => 'required|unique:tinh,ten_tinh,'
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ma_tinh' => 'Mã tỉnh thành',
            'ten_tinh' => 'Tên tỉnh'
        ]);
        $input = $request->all();
        $province = Tinh::create($input);
        $notification = array(
            'message' => 'Tạo tỉnh thành thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('provinces.index')
                        ->with($notification);
    }

    public function importProvinces()
    {
        Config::set(['excel.import.startRow', 2]);
        Excel::import(new ProvinceImport,request()->file('file'));
        $notification = array(
            'message' => 'Import dữ liệu thành công',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $province = Tinh::findOrFail($request->id_province);
        $this->validate($request, [
            'ma_tinh' => 'required|unique:tinh,ma_tinh,'.$request->id_province,
            'ten_tinh' => 'required|unique:tinh,ten_tinh,'.$request->id_province
            
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ma_tinh' => 'Mã tỉnh thành',
            'ten_tinh' => 'Tên tỉnh thành'
        ]);
        $input = $request->all();
        $province->update($input);
        $notification = array(
            'message' => 'Cập nhật Tỉnh thành thành công', 
            'alert-type' => 'info'
            );
        return redirect()->route('provinces.index')
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
        $province = Tinh::findOrFail($request->id_province);
        $province->delete();
        $notification = array(
            'message' => 'Xóa Tỉnh thành công', 
            'alert-type' => 'warning'
            );
        return redirect()->route('provinces.index')
                        ->with($notification);
    }
}
