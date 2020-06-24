<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Duan;
use Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth; //important


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
        return view('home');
    }

    public function userRegister(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'id_duan' => 'require'
            // 'roles' => 'required'
        ]);

        $input = $request->all(); //khai bao tat ca cac truong trong csdl o user.php fillable
        $input['password'] = Hash::make($input['password']); //ma hoa password

        //upload avatar len csdl
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension(); //lay duoi file
            if($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg'){

            }
            else
                return redirect()->back()->with('errror', 'Hệ thống chưa hỗ trợ định dạng file mới upload!');
            $file_name = $file->getClientOriginalName();
            $random_file_name = str_random(4).'_'.$file_name;
            while(file_exists('upload/avatar/'.$random_file_name)){
                $random_file_name = str_random(4).'_'.$file_name; 
            }
            $file->move('upload/avatar',$random_file_name);
            $input['avatar'] = 'upload/avatar/'.$random_file_name;
        }
        else $input['avatar']='';

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

    public function updateUserProfile(Request $request){
        $user =User::find(Auth::user()->id);
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'same:confirm-password',
        ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user->update($input);

        return redirect()->route('profile', $user->id)
                        ->with('success','User updated successfully');
    }
}
