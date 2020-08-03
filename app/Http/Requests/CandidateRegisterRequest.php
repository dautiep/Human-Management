<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRegisterRequest extends FormRequest
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
        return [
            'username' => 'required|unique:users,username',
            'password' => 'required|same:confirm-password',
            'email' => 'required|email|unique:users,email',
            'hoten' => 'required',
            'gioi_tinh' => 'required',
            'so_dien_thoai' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản người dùng!',
            'username.unique' => 'Tên tài khoản này đã có người sử dụng!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.same' => 'Mật khẩu không trùng nhau!',
            'email.required' => 'Vui lòng nhập địa chỉ email người dùng!',
            'email.email' => 'Địa chỉ email không hợp lệ!',
            'email.unique' => 'Địa chỉ mail này đã có người sử dụng!',
            'hoten.required' => 'Vui lòng nhập họ tên người dùng!',
            'gioi_tinh.required' => 'Vui lòng chọn giới tính!',
            'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại!',
        ];
    }
}
