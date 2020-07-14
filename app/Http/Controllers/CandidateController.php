<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CandidateRegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\User;


class CandidateController extends Controller
{
    public function index()
    {
        $candidates = User::where('danhso', 'NULL')->get();
        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('candidates.register');
    }

    public function store(CandidateRegisterRequest $request)
    {
        $validated = $request->validated();
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
        $notification = array(
            'message' => 'Đăng ký ứng viên thành công', 
            'alert-type' => 'success'
        );
        return redirect()->route('recruitment')->with($notification);
    }
}
