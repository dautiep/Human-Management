<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddJobRequest extends FormRequest
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
            'ma_job' => 'required|unique:job,ma_job',
            'ten_job' => 'required',     
            'li_do_tuyen' => 'required',
            'so_luong_tuyen' => 'required',
            'id_chucdanh' => 'required',
            'id_user' => 'required',
            'id_duan' => 'required',
            'songay_tieuchuan_vitri' => 'required',
            'thoigian_offer' => 'required',
            'thoigian_den_onboard' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ma_job.required' => 'Vui lòng nhập mã công việc!',
            'ma_job.unique' => 'Mã công việc đã tồn tại!',
            'ten_job.required' => 'Vui lòng nhập tên công việc!',
            'li_do_tuyen.required' => 'Vui lòng nhập lí do tuyển công việc!',
            'so_luong_tuyen.required' => 'Vui lòng nhập số lượng ứng viên cần tuyển!',
            'id_chucdanh.required' => 'Vui lòng chọn vị trí tuyển dụng!',
            'id_user.required' => 'Vui lòng chọn người tạo công việc!',
            'id_duan.required' => 'Vui lòng chọn dự án!',
            'songay_tieuchuan_vitri.required' => 'Vui lòng nhập số ngày tiêu chuẩn!',
            'thoigian_offer.required' => 'Vui lòng nhập thời gian đề xuất công việc!',
            'thoigian_den_onboard.required' => 'Vui lòng nhập thời gian onboard!',
        ];
    }
}
