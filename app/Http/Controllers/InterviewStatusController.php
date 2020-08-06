<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Trangthaiphongvan;
use Illuminate\Http\Request;

class InterviewStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = Trangthaiphongvan::orderBy('id', 'ASC')->get();
        return view('interview_status.index', ['states' => $states])
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interview_status.create');
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
            'ten_trangthai_phongvan' => 'required|unique:trangthaiphongvan,ten_trangthai_phongvan,'
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_trangthai_phongvan' => 'Tên trạng thái phỏng vấn',
        ]);
        $input = $request->all();
        $status = Trangthaiphongvan::create($input);
        $notification = array(
            'message' => 'Tạo trạng thái thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('interview-status.index')
                        ->with($notification);
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
        $status = Trangthaiphongvan::findOrFail($request->id_status);
        $this->validate($request, [
            'ten_trangthai_phongvan' => 'required|unique:trangthaiphongvan,ten_trangthai_phongvan,'.$request->id_status,
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_trangthai_phongvan' => 'Tên trạng thái phỏng vấn',
        ]);
        $input = $request->all();
        $status->update($input);
        $notification = array(
            'message' => 'Cập nhật trạng thái thành công', 
            'alert-type' => 'info'
            );
        return redirect()->route('interview-status.index')
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
        $status = Trangthaiphongvan::findOrFail($request->id_status);
        $status->delete();
        $notification = array(
            'message' => 'Xóa trạng thái thành công', 
            'alert-type' => 'warning'
            );
        return redirect()->route('interview-status.index')
                        ->with($notification);
    }
}
