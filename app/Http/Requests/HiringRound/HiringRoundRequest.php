<?php

namespace App\Http\Requests\HiringRound;

use Illuminate\Foundation\Http\FormRequest;

class HiringRoundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hiring_round_name' =>'required',
            'start_date' =>'required',
            'end_date' =>'required',
            'status' =>'required',
            'description' =>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'hiring_round_name.required' => 'Vui lòng nhập tên đợt ứng tuyển',
            'start_date.required' => 'Vui lòng chọn ngày bắt đầu',
            'end_date.required' => 'Vui lòng chọn ngày kết thúc',
            'status.required' => 'Vui lòng chọn trạng thái',
            'description.required' => 'Vui lòng nhập mô tả'
        ];
    }
}
