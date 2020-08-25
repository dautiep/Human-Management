<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Chucdanh;
use App\Cv;
use App\Detail_job;
use App\User;
use App\Slider;
use App\Duan;
use App\Http\Requests\AddCandidateRequest;
use App\Http\Requests\ApplyJobRequest;
use App\Job;   
use Illuminate\Support\Facades\Auth; //important
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileUserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Huyen;
use App\Nguonjob;
use App\Tinh;
use App\Trinhdovanhoa;
use App\Ungvien;
use App\Xa;
use Illuminate\Support\Facades\Storage;

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

    

    public function applyJob(ApplyJobRequest $request, $ma_job)
    {
        $job = Job::where('ma_job', 'LIKE', "{$ma_job}")->first();
        $input = $request->all();
        $date = Carbon::create($request->ngay_sinh);
        $input['ngay_sinh'] = $date->toDateString();
        $candidate = Ungvien::create($input);
        $notification = array(
            'message' => 'Ứng tuyển thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('detail-job', $ma_job)
            ->with($notification);
    }

    public function uploadCV(Request $request, $ma_job)
    {
        $job = Job::where('id', $ma_job)->first();
        $validation = Validator::make($request->all(), [
            'ho_ten' => 'required',
            'email' => 'required|email',
            'so_dien_thoai' => 'required',
            'select_file' => 'required|mimetypes:application/pdf',
        ],

        [
            'required' => ':attribute không được bỏ trống!',
            'mimetypes' => ':attribute phải là file pdf',
            'email' => ':attribute không hợp lệ'
        ],

        [
            'select_file' => 'Hồ sơ tải lên',
            'ho_ten' => 'Họ tên',
            'so_dien_thoai' => 'Số điện thoại',
            'email' => 'Địa chỉ mail'
            
        ]);
        if($validation->passes())
        {
            $cv = $request->file('select_file');
            $new_name = $this->bo_dau_vn($request->ho_ten).'.'.$cv->getClientOriginalExtension();
            $path = public_path('upload/cv/'.$job->ma_job);
            if(!Storage::exists($path))
            {
                Storage::makeDirectory($path, 0777, true, true);
                $cv->move('upload/cv/'.$job->ma_job,$new_name);
                $input = $request->all();
                $input['ten_cv'] = $new_name;
                $cv = Cv::create($input);
            
                return response()->json(['message'=> 'Ứng tuyển thành công']);
            }
            else
            {
                $cv->move('upload/cv/'.$job->ma_job,$new_name);
                return response()->json(['message'=> 'Tải hồ sơ lên thành công']);
            }
        }
        else
        {
            return response()->json(['error' => $validation->errors()->first()]);
        }
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

    public function bo_dau_vn($str)
    {

        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd' => 'đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i' => 'í|ì|ỉ|ĩ|ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D' => 'Đ',

            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ', '_', $str);
        $str = strtolower($str);
        return $str;
    }
}
