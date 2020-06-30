<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectRequest extends FormRequest
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
            'ten_du_an' => 'required|unique:duan,ten_du_an',
            'quymo_tbinh' => 'required',
            'id_user' => 'required',
            'mota_duan' => 'required',
            'thoigian_batdau' => 'required',
            'thoigian_ketthuc' => 'required'            
        ];
    }

    public function messages()
    {
        return [
            'ten_du_an.required' => 'Vui lòng nhập tên dự án!',
            'ten_du_an.unique' => 'Tên dự án bị trùng với dự án đã có!',
            'quymo_tbinh.required' => 'Vui lòng nhập quy mô trung bình!',
            'mota_duan.required' => 'Vui lòng nhập mô tả dự án!',
            'id_user.required' => 'Vui lòng chọn người tạo dự án!',
            'thoigian_batdau.required' => 'Vui lòng chọn ngày bắt đầu dự án!',
            'thoigian_ketthuc.required' => 'Vui lòng chọn ngày kết thúc dự án!',

        ];
    }
}
