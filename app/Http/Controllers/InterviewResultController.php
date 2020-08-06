<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ketquaphongvan;
use Illuminate\Http\Request;

class InterviewResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Ketquaphongvan::orderBy('id', 'ASC')->get();
        return view('interview_result.index', ['results' => $results])
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interview_result.create');
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
            'ten_ketqua_phongvan' => 'required|unique:ketquaphongvan,ten_ketqua_phongvan,'
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_ketqua_phongvan' => 'Tên kết quả phỏng vấn',
        ]);
        $input = $request->all();
        $result = Ketquaphongvan::create($input);
        $notification = array(
            'message' => 'Tạo trạng thái kết quả thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('interview-result.index')
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
        $status = Ketquaphongvan::findOrFail($request->id_result);
        $this->validate($request, [
            'ten_ketqua_phongvan' => 'required|unique:ketquaphongvan,ten_ketqua_phongvan,'.$request->id_result,
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_ketqua_phongvan' => 'Tên trạng thái kết quả phỏng vấn',
        ]);
        $input = $request->all();
        $status->update($input);
        $notification = array(
            'message' => 'Cập nhật trạng thái kết quả thành công', 
            'alert-type' => 'info'
            );
        return redirect()->route('interview-result.index')
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
        $result = Ketquaphongvan::findOrFail($request->id_result);
        $result->delete();
        $notification = array(
            'message' => 'Xóa trạng thái kết quả thành công', 
            'alert-type' => 'warning'
            );
        return redirect()->route('interview-result.index')
                        ->with($notification);
    }
}
