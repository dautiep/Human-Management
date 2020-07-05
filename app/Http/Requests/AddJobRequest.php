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
            'ten_job' => 'required|unique:job,ten_job',
        ];
    }

    public function messages()
    {
        return [
            'ma_job.unique' => 'Mã công việc đã tồn tại!',
            'ten_job.unique' => 'Tên công việc đã tồn tại!',
        ];
    }
}
