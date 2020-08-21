<?php

namespace App\Http\Controllers;

use App\Chucdanh;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCandidateRequest;
use Illuminate\Support\Carbon;
use App\Huyen;
use App\Job;
use App\Ketquaphongvan;
use App\Mail\SendMailInterview;
use App\Mail\SendMailSuccess;
use App\Mail\SendMailFail;
use App\Nguonjob;
use App\Tinh;
use App\Trangthaiphongvan;
use App\Trinhdovanhoa;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Ungvien;
use App\Xa;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Ungvien::orderBy('id', 'ASC')->get();
        return view('candidates.index', compact('candidates'))
        ->with('i');
    }

    public function showListCandidateApply()
    {
        $candidates = Ungvien::where('id_trangthai_phongvan', 1)->get();
        return view('candidates.apply', compact('candidates'))
        ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Chucdanh::all();
        $jobs = Job::all();
        $levels = Trinhdovanhoa::all();
        $results = Ketquaphongvan::all();
        $states = Trangthaiphongvan::all();
        $sources = Nguonjob::all();
        $provinces = Tinh::all();
        $districts = Huyen::all();
        $communes = Xa::all();
        return view('candidates.create', ['results' => $results, 'states' => $states,
                                        'sources' => $sources, 'levels' => $levels,
                                        'jobs' => $jobs, 'positions' => $positions,
                                        'provinces' => $provinces, 'districts' => $districts,
                                        'communes' => $communes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCandidateRequest $request)
    {
        $validated = $request->validated();
        $input = $request->all();
        $date = Carbon::create($request->ngay_sinh);
        $input['ngay_sinh'] = $date->toDateString();
        $candidate = Ungvien::create($input);
        $notification = array(
            'message' => 'Tạo ứng viên thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('candidates.index')
                                    ->with($notification);

    }

    
    public function confirmCandidates($id)
    {
        $candidate = Ungvien::where('id', $id)->first();
        if($candidate->id_trangthai_phongvan == 5)
        {
            $notification = array(
                'message' => 'Ứng viên này đã gửi mail phỏng vấn!',
                'alert-type' => 'info'
            );
            return redirect()->route('candidates.index')->with($notification);
        }
        return view('candidates.confirm', ['candidate' => $candidate]);
    }

    public function sendMailInterview(Request $request, $id)
    {
        $candidate = Ungvien::where('id', $id)->first();
        $data = array();
        $data[] = [
            'ho_ten' => $candidate->ho_ten,
            'ten_chuc_danh' => $candidate->chucdanh->ten_chuc_danh,
            'gio' => $request->gio_phongvan,
            'ngay' => $request->thoigian_phongvan,
            'dia_diem' => $request->diadiem_phongvan,
        ];
        Mail::to($request->email)->send(new SendMailInterview($data));
        $input['id_trangthai_phongvan'] = 5;
        $candidate->update($input);
        $notification = array(
            'message' => 'Gửi mail thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('candidates.index')->with($notification);
        
    }

    public function sendMailSuccess($id)
    {
        $candidate = Ungvien::where('id', $id)->first();
        if($candidate->id_ketqua_phongvan == 1 ||  $candidate->id_ketqua_phongvan == 2)
        {
            $notification = array(
                'message' => 'Ứng viên này đã gửi mail kết quả!',
                'alert-type' => 'info'
            );
            return redirect()->route('candidates.index')->with($notification);
        }
        $data = array();
        $data[] = [
            'ho_ten' => $candidate->ho_ten,
            'cong_viec' => $candidate->job->ten_job,
            'vi_tri' => $candidate->chucdanh->ten_chuc_danh,
        
        ];
        
        Mail::to($candidate->email)->send(new SendMailSuccess($data));
        $input['id_ketqua_phongvan'] = 1;
        $candidate->update($input);
        $notification = array(
            'message' => 'Gửi mail kết quả thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('candidates.index')->with($notification);
    }

    public function sendMailFail($id)
    {
        $candidate = Ungvien::where('id', $id)->first();
        if($candidate->id_ketqua_phongvan == 1 ||  $candidate->id_ketqua_phongvan == 2)
        {
            $notification = array(
                'message' => 'Ứng viên này đã gửi mail kết quả!',
                'alert-type' => 'info'
            );
            return redirect()->route('candidates.index')->with($notification);
        }
        $data = array();
        $data[] = [
            'ho_ten' => $candidate->ho_ten,
            'cong_viec' => $candidate->job->ten_job,
            'vi_tri' => $candidate->chucdanh->ten_chuc_danh,
        ];
        
        Mail::to($candidate->email)->send(new SendMailFail($data));
        $input['id_ketqua_phongvan'] = 2;
        $candidate->update($input);
        $notification = array(
            'message' => 'Gửi mail kết quả thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('candidates.index')->with($notification);
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
        $candidate = Ungvien::where('id', $id)->first();
        $provinces = Tinh::all();
        $districts = Huyen::all();
        $communes = Xa::all();
        $sources = Nguonjob::all();
        $levels = Trinhdovanhoa::all();
        $jobs = Job::all();
        $positions = Chucdanh::all();
        $states = Trangthaiphongvan::all();
        $results = Ketquaphongvan::all();
        return view('candidates.edit',['provinces' => $provinces, 'districts' => $districts,
                                    'communes' => $communes, 'sources' => $sources,
                                    'levels' => $levels, 'jobs' => $jobs,
                                    'candidate' => $candidate, 'positions' => $positions,
                                    'states' => $states, 'results' => $results]);
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
        $candidate = Ungvien::where('id', $id)->first();
        $this->validate($request, [
            'ma_ungvien' => 'required|unique:ungvien,ma_ungvien,'.$candidate->id,
            'ho_ten' => 'required',     
            'gioi_tinh' => 'required',
            'ngay_sinh' => 'required',
            'so_dien_thoai' => 'required',
            'email' => 'required|email|unique:ungvien,email,'.$candidate->id,
            'sonha' => 'required',

        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'unique' => ':attribute đã tồn tại!'
        ],

        [
            'ma_ungvien' => 'Mã ứng viên',
            'ho_ten'=> 'Họ tên ứng viên',
            'gioi_tinh'=> 'Giới tính',
            'ngay_sinh'=> 'Ngày sinh ứng viên',
            'so_dien_thoai' => 'Số điện thoại',
            'email' => 'Email',
            'sonha' => 'Địa chỉ hiện tại',
        ]);

        $input = $request->all();
        $date = Carbon::create($request->ngay_sinh);
        $input['ngay_sinh'] = $date->toDateString();
        $candidate->update($input);
        $notification = array(
            'message' => 'Cập nhật thông tin ứng viên thành công',
            'alert-type' => 'info'
        );
        return redirect()->route('candidates.index')
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
        $candidate = Ungvien::where('id', $request->ma_candidate)->first();
        $candidate->delete();
        $notification = array(
            'message' => 'Xóa thông tin ứng viên thành công',
            'alert-type' => 'warning'
        );
        return redirect()->route('candidates.index')
            ->with($notification);
    }
}
