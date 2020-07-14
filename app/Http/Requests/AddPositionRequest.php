<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPositionRequest extends FormRequest
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
            'ma_chuc_danh' => 'required|unique:chucdanh,ma_chuc_danh',
            'ten_chuc_danh' => 'required|unique:chucdanh,ten_chuc_danh',
        ];
    }

    public function messages()
    {
        return [
            'ma_chuc_danh.required' => 'Mã chức danh không được bỏ trống!',
            'ma_chuc_danh.unique' => 'Mã chức danh đã tồn tại!',
            'ten_chuc_danh.required' => 'Tên chức danh không được bỏ trống!',
            'ten_chuc_danh.unique' => 'Tên chức danh đã tồn tại!',
        ];
    }
}
