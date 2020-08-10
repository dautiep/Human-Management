<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use App\Huyen;
use App\Imports\DistrictImport;
use App\Tinh;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = Huyen::orderBy('id', 'ASC')->get();
        return view('districts.index', ['districts' => $districts])
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Tinh::all();
        return view('districts.create', ['provinces' => $provinces]);
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
            'id_tinh' => 'required',
            'ma_huyen' => 'required|unique:huyen,ma_huyen,',
            'ten_huyen' => 'required|unique:huyen,ten_huyen,'
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'id_tinh' => 'Tỉnh thành',
            'ma_huyen' => 'Mã huyện',
            'ten_huyen' => 'Tên huyện'
        ]);
        $input = $request->all();
        $district = Huyen::create($input);
        $notification = array(
            'message' => 'Tạo quận thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('districts.index')
                        ->with($notification);
    }

    public function importDistricts()
    {
        Config::set(['excel.import.startRow', 2]);
        Excel::import(new DistrictImport,request()->file('file'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
