<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Duan;
use Illuminate\Support\Facades\Auth; //important
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileUserRequest;


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
        return view('home_page.index');
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
