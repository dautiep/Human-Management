<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class UpdateProfileUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = User::find(Auth::user()->id);
        return [
            'username' => 'required|unique:users,username,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'hoten' => 'required',
            'so_dien_thoai' => 'required|unique:users,so_dien_thoai,'.$user->id,
            'danhso' => 'required|unique:users,danhso,'.$user->id,
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản người dùng!',
            'username.unique' => 'Tên người dùng đã được sử dụng!',
            'email.required' => 'Vui lòng nhập địa chỉ email người dùng!',
            'email.email' => 'Địa chỉ email không hợp lệ!',
            'email..unique' => 'Địa chỉ mail này đã có người sử dụng!',
            'hoten.required' => 'Vui lòng nhập họ tên người dùng!',
            'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại!',
            'danhso.required' => 'Vui lòng nhập danh số người dùng!',
            'danhso.unique' => 'Danh số này đã có người sử dụng!',
        ];
    }
}
