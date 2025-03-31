<?php

namespace App\Http\Requests\PostingPosition;

use Illuminate\Foundation\Http\FormRequest;

class PostingPositionRequest extends FormRequest
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
            'job_posting_id' => 'required',
            'open_position_id' => 'required',
            
        ];
    }

    public function messages(): array
    {
        return [
            'job_posting_id.required' => 'Bài đăng công việc là bắt buộc.',
            'open_position_id.required' => 'Vị trí công việc là bắt buộc.',
        ];
    }
}
