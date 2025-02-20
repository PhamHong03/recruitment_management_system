<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'branch_name' =>'required',
            'branch_position' =>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'branch_name.required' => 'Vui lòng nhập tên chi nhánh',
            'branch_position.required' => 'Vui lòng chọn vị trí cho chi nhánh'
        ];
    }
}
