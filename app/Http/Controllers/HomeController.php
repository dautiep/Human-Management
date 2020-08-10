<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Detail_job;
use App\User;
use App\Slider;
use App\Duan;
use App\Http\Requests\AddCandidateRequest;
use App\Job;   
use Illuminate\Support\Facades\Auth; //important
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileUserRequest;
use Illuminate\Support\Carbon;
use App\Huyen;
use App\Nguonjob;
use App\Tinh;
use App\Trinhdovanhoa;
use App\Ungvien;
use App\Xa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Duan::all();
        $sliders = Slider::all();
        $about = About::where('id', 1)->first();
        return view('home_page.index', ['about' => $about, 'sliders' => $sliders,
                                        'projects' => $projects]);
    }

    public function showJobsInProject($slug)
    {
        $sliders = Slider::all();
        $project = Duan::where('slug', 'LIKE', "{$slug}")->first();
        $jobs = Job::where('id_duan', $project->id)->get();
        return view('home_page.jobs', ['sliders' => $sliders, 'project' => $project, 
                                        'jobs' => $jobs]);
        
    }

    public function showDetailJob($ma_job)
    {
        $sliders = Slider::all();
        $job = Job::where('ma_job', 'LIKE', "{$ma_job}")->first();
        $detail_job = Detail_job::where('id_job', $job->id)->first();
        return view('home_page.detail_job', ['sliders' => $sliders, 'job' => $job,
                                            'detail_job' => $detail_job]);
    }

    public function showViewApplyJob($ma_job)
    {
        $provices = Tinh::all();
        $districts = Huyen::all();
        $communes = Xa::all();
        $sources = Nguonjob::all();
        $levels = Trinhdovanhoa::all();
        $sliders = Slider::all();
        $job = Job::where('ma_job', 'LIKE', "{$ma_job}")->first();
        $detail_job = Detail_job::where('id_job', $job->id)->first();
        return view('home_page.apply_job', ['sliders' => $sliders, 'job' => $job,
                                            'sources' => $sources, 'levels' => $levels,
                                            'districts' => $districts, 'communes' => $communes,
                                            'detail_job' => $detail_job, 'provinces' => $provices]);
    }

    public function showDistrictsInProvince(Request $request)
    {
        if ($request->ajax()) {
            $districts = Huyen::where('id_tinh', $request->id_tinh)->select('id', 'ten_huyen')->get();
            return response()->json($districts);
        }
    }

    public function showCommunesInDistrict(Request $request)
    {
        if ($request->ajax()) {
            $communes = Xa::where('id_huyen', $request->id_huyen)->select('id', 'ten_xa')->get();
            return response()->json($communes);
        }
    }

    public function applyJob(AddCandidateRequest $request, $ma_job)
    {
        $job = Job::where('ma_job', 'LIKE', "{$ma_job}")->first();
        $validated = $request->validated();
        $input = $request->all();
        $date = Carbon::create($request->ngay_sinh);
        $input['ngay_sinh'] = $date->toDateString();
        $candidate = Ungvien::create($input);
        $notification = array(
            'message' => 'Ứng tuyển thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('detail-job', $job->ma_job)
            ->with($notification);
    }

    public function userRegister(Request $request)
    {

        $input = $request->all(); //khai bao tat ca cac truong trong csdl o user.php fillable
        $input['danhso'] = 'NULL';
        $input['password'] = Hash::make($input['password']); //ma hoa password

        //avatar
        if($request->gioi_tinh == 1)
        {
            $file_name = 'avatar_male.png';
            $random_file_name = str_random(4).'_'.$file_name;
            $input['avatar'] = $file_name;
        }
        else
        {
            $file_name = 'avatar_female.png';
            $random_file_name = str_random(4).'_'.$file_name;
            $input['avatar'] = $file_name;
        }

        $user = User::create($input);
        return redirect()->route('login');
    }

    public function getViewUserRegister(){
        $projects = Duan::all();
        return view('users.register', ['projects' => $projects]);
    }

    public function userProFile(Request $request){
        $profile = User::find(Auth::user()->id);
        return view('users.profile', compact('profile'));
    }

    public function updateUserProfile(UpdateProfileUserRequest $request)
    {
        $user =User::find(Auth::user()->id);
        $validated = $request->validated(); 

        $input = $request->all();
        $user->update($input);
        $notification = array(
            'message' => 'Cập nhật thông tin thành công', 
            'alert-type' => 'success'
          );

        return redirect()->route('profile', $user->id)
                        ->with($notification);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', new MatchOldPassword],
            'new_password' => 'required',
            'confirm_password' => 'same:new_password',
        ],

        [
            'required' => 'Bạn phải nhập :attribute',
            'same' => ':attribute và mật khẩu mới phải trùng nhau'
        ],

        [
            'password' => 'mật khẩu hiện tại',
            'new_password' => 'mật khẩu mới',
            'confirm_password' => 'Mật khẩu xác thực'
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        $notification = array(
            'message' => 'Thay đổi mật khẩu thành công', 
            'alert-type' => 'success'
          );
   
        return redirect()->route('profile')
                        ->with($notification);
    }
}
