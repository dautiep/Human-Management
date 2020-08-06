<?php

namespace App\Http\Controllers;

use App\Detail_job;
use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\Request;

class DetailJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_jobs = Detail_job::orderBy('id', 'ASC')->get();
        return view('detail_jobs.index', ['detail_jobs' => $detail_jobs])
                ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        return view('detail_jobs.create', ['jobs' => $jobs]);
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
            'ten_chitiet' => 'required|unique:detail_job,ten_chitiet,',
            'mo_ta_cong_viec' => 'required',
            'quyen_loi' => 'required',
            'yeu_cau_cong_viec' => 'required',
            'thoi_gian_lam_viec' => 'required',
            'id_job' => 'required',
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_chitiet' => 'Tên chi tiết công việc',
            'mo_ta_cong_viec' => 'Mô tả công việc',
            'quyen_loi' => 'Quyền lợi',
            'yeu_cau_cong_viec' => 'Yêu cầu công việc',
            'thoi_gian_lam_viec' => 'Thời gian làm việc',
            'id_job' => 'Mã công việc',
        ]);
        $input = $request->all();
        $detail_job = Detail_job::create($input);
        $notification = array(
            'message' => 'Tạo chi tiết công việc thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('detail-jobs.index')
                        ->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ma_job)
    {
        $jobs = Job::all();
        $job = Job::where('ma_job', 'LIKE', "{$ma_job}")->first();
        $detail_job = Detail_job::where('id_job', $job->id)->first();
        return view('detail_jobs.edit', ['jobs' => $jobs, 'job' => $job, 
                                        'detail_job' => $detail_job]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ma_job)
    {
        $job = Job::where('ma_job', 'LIKE', "{$ma_job}")->first();
        $detail_job = Detail_job::where('id_job', $job->id)->first();
        $this->validate($request, [
            'ten_chitiet' => 'required|unique:detail_job,ten_chitiet,'.$detail_job->id,
            'mo_ta_cong_viec' => 'required',
            'quyen_loi' => 'required',
            'yeu_cau_cong_viec' => 'required',
            'thoi_gian_lam_viec' => 'required',
            'id_job' => 'required',
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ten_chitiet' => 'Tên chi tiết công việc',
            'mo_ta_cong_viec' => 'Mô tả công việc',
            'quyen_loi' => 'Quyền lợi',
            'yeu_cau_cong_viec' => 'Yêu cầu công việc',
            'thoi_gian_lam_viec' => 'Thời gian làm việc',
            'id_job' => 'Mã công việc',
        ]);
        $input = $request->all();
        $detail_job->update($input);
        $notification = array(
            'message' => 'Cập nhật chi tiết thông tin công việc thành công',
            'alert-type' => 'info'
        );
        return redirect()->route('detail-jobs.index')
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
        $detail_job = Detail_job::where('id', $request->ma_detailjob)->first();
        $detail_job->delete();
        $notification = array(
            'message' => 'Xóa chi tiết công việc thành công',
            'alert-type' => 'warning'
        );
        return redirect()->route('detail-jobs.index')
            ->with($notification);
    }
}
