<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Http\Requests\AddJobRequest;
use App\Job;
use App\User;
use App\Duan;
use App\Chucdanh;
use Illuminate\Support\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('id', 'ASC')->get();
        return view('jobs.index', ['jobs' => $jobs])
                ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Chucdanh::orderBy('id', 'ASC')->get();
        $users = User::orderBy('id', 'ASC')->get();
        $projects = Duan::orderBy('id', 'ASC')->get();
        return view('jobs.create', ['users' => $users, 'projects' => $projects, 
                                    'positions' => $positions
                                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddJobRequest $request)
    {
        $validated = $request->validated();
        $input = $request->all();
        $input['hinh'] = 'hoasao_job.jpg';
        $jobs = Job::where('id_duan',$request->id_duan)->get();
        foreach($jobs as $job)
        {
            
            if($request->ten_job == $job->ten_job)
            {
                $notification = array(
                    'message' => 'Tên công việc đã tồn tại trong dự án!',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
        }
        $project = Duan::where('id', $request->id_duan)->first();
        $start_date = Carbon::create($project->thoigian_batdau);
        $end_date = Carbon::create($project->thoigian_ketthuc);
        if($request->so_luong_tuyen > $project->quymo_tbinh)
        {
            $notification = array(
                'message' => 'Số lượng lớn hơn số lượng của dự án('.$project->quymo_tbinh.')!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        else
        {

            $offer_date = Carbon::create($request->thoigian_offer);
            if($start_date->diffInDays($offer_date, false) < 0 || $offer_date->diffInDays($end_date, false) < 31)
            {
                $notification = array(
                    'message' => 'Thời gian offer nằm ngoài thời gian dự án!',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
            else
            {
                $onboard_date = Carbon::create($request->thoigian_den_onboard);
                if($offer_date->diffInDays($onboard_date, false) < 30)
                {
                    $notification = array(
                        'message' => 'Thời gian onboard tối thiểu là 30 ngày!',
                        'alert-type' => 'error'
                    );
                    return back()->with($notification);
                }
                else
                {

                    $input['thoigian_offer'] = $offer_date->toDateString();
                    $input['thoigian_den_onboard'] = $onboard_date->toDateString();
                    $job = Job::create($input);
                    $notification = array(
                        'message' => 'Tạo công việc thành công',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('jobs.index')
                                    ->with($notification);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ma_job)
    {
        $job = Job::where('ma_job','LIKE',"{$ma_job}")->first();
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ma_job)
    {
        $positions = Chucdanh::orderBy('id', 'ASC')->get();
        $users = User::orderBy('id', 'ASC')->get();
        $projects = Duan::orderBy('id', 'ASC')->get();
        $job = Job::where('ma_job', 'LIKE', "{$ma_job}")->first();
        return view('jobs.edit', ['job' => $job, 'positions' => $positions,
                                    'users' => $users, 'projects' => $projects]);
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
        $this->validate($request, [
            'ma_job' => 'required|unique:job,ma_job,'.$job->id,
            'ten_job'=>'required',
            'li_do_tuyen'=>'required',
            'so_luong_tuyen'=>'required',
            'id_user' => 'required',
            'id_duan' => 'required',
            'id_chucdanh' => 'required',
            'songay_tieuchuan_vitri'=>'required',
            'thoigian_offer'=>'required',
            'thoigian_den_onboard'=>'required',

        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ma_job' => 'Mã công việc',
            'ten_job'=> 'Tên công việc',
            'li_do_tuyen'=> 'Lý do tuyển',
            'so_luong_tuyen'=> 'Số lượng ứng viên',
            'id_user' => 'Người tạo công việc',
            'id_duan' => 'Dự án',
            'id_chucdanh' => 'Vị trí tuyển dụng',
            'songay_tieuchuan_vitri'=> 'Số ngày đào tạo',
            'thoigian_offer'=> 'Thòi gian đề xuất',
            'thoigian_den_onboard'=> 'Thời gian lên line',
        ]);
        
        $input = $request->all();
        $jobs = Job::where('id_duan',$request->id_duan)->get();
        $dem = 0;
        foreach($jobs as $job)
        {
            
            if($request->ten_job == $job->ten_job)
                $dem++;
            
        }
        if($dem == 2)
        {
            $notification = array(
                'message' => 'Tên công việc đã tồn tại trong dự án!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        else
        {
            
            $project = Duan::where('id', $request->id_duan)->first();
            $start_date = Carbon::create($project->thoigian_batdau);
            $end_date = Carbon::create($project->thoigian_ketthuc);
            $offer_date = Carbon::create($request->thoigian_offer);
            if($start_date->diffInDays($offer_date, false) < 0 || $offer_date->diffInDays($end_date, false) < 31)
            {
                $notification = array(
                    'message' => 'Thời gian offer nằm ngoài thời gian dự án!',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
            else
            {
                $onboard_date = Carbon::create($request->thoigian_den_onboard);
                if($offer_date->diffInDays($onboard_date, false) < 30)
                {
                    $notification = array(
                        'message' => 'Thời gian onboard tối thiểu là 30 ngày!',
                        'alert-type' => 'error'
                    );
                    return back()->with($notification);
                }
                else
                {
    
                    $input['thoigian_offer'] = $offer_date->toDateString();
                    $input['thoigian_den_onboard'] = $onboard_date->toDateString();
                    $job->update($input);
                    $notification = array(
                        'message' => 'Cập nhật thông tin công việc thành công',
                        'alert-type' => 'info'
                    );
                    return redirect()->route('jobs.index')
                                    ->with($notification);
                }
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $job = Job::where('ma_job', 'LIKE', "{$request->ma_job}")->first();
        $job->detail_job->delete();
        $job->delete();
        $notification = array(
            'message' => 'Xóa công việc thành công',
            'alert-type' => 'warning'
        );
        return redirect()->route('jobs.index')
            ->with($notification);
    }
}
