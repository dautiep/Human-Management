<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyJobRequest extends FormRequest
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
            'ho_ten' => 'required',     
            'gioi_tinh' => 'required',
            'ngay_sinh' => 'required',
            'so_dien_thoai' => 'required',
            'email' => 'required|email',
            'sonha' => 'required',
            'id_xa' => 'required',
            'id_huyen' => 'required',
            'id_tinh' => 'required',
            'id_nguonjob' => 'required',
            'id_job' => 'required',
            'id_chucdanh' => 'required',
            'id_trinhdovanhoa' => 'required',
            'id_trangthai_phongvan' => 'required',
            'id_ketqua_phongvan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.required' => 'Vui lòng nhập họ tên',
            'gioi_tinh.required' => 'Vui lòng chọn giới tính!',
            'ngay_sinh.required' => 'Vui lòng nhập ngày sinh!',
            'so_dien_thoai.required' => 'Vui lòng nhập số điện thoai!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Địa chỉ mail không hợp lệ!',
            'sonha.required' => 'Vui lòng nhập số nhà!',
            'id_xa.required' => 'Vui lòng chọn xã!',
            'id_huyen.required' => 'Vui lòng chọn huyện!',
            'id_tinh.required' => 'Vui lòng chọn tỉnh!',
            'id_nguonjob.required' => 'Vui lòng chọn nguồn công việc!',
            'id_job.required' => 'Vui lòng chọn công việc!',
            'id_chucdanh.required' => 'Vui lòng chọn vị trí!',
            'id_trinhdovanhoa.required' => 'Vui lòng chọn trình độ  văn hóa!',
            'id_trangthai_phongvan.required' => 'Vui lòng chọn trạng thái phỏng vấn!',
            'id_ketqua_phongvan.required' => 'Vui lòng chọn trạng thái kết quả phỏng vấn!',
        ];
    }
}
