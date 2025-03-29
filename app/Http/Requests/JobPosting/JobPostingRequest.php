<?php

namespace App\Http\Requests\JobPosting;

use Illuminate\Foundation\Http\FormRequest;

class JobPostingRequest extends FormRequest
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
            'job_posting_name' => 'required',
            'job_posting_description' => 'required',
            'job_posting_request' => 'required',
            'job_posting_content' => 'required',
            'job_posting_salary' => 'required',
            'job_posting_start_date' => 'required',
            'job_posting_end_date' => 'required',
            'job_posting_status' => 'required',
            'job_posting_poster' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'job_posting_name.required' => 'Vui lòng nhập tên bài đăng',
            'job_posting_description.required' => 'Vui lòng nhập nhập mô tả bài đăng',
            'job_posting_request.required' => 'Vui lòng nhập yêu cầu tuyển dụng',
            'job_posting_content.required' => 'Vui lòng nhập nội dung chính của bài đăng',
            'job_posting_salary.required' => 'Vui lòng nhập mức lương dự tính',
            'job_posting_start_date.required' => 'Vui lòng nhập ngày bắt đầu tuyển dụng',
            'job_posting_end_date.required' => 'Vui lòng nhập ngày kết thúc bài đăng tuyển dụng',
            'job_posting_status.required' => 'Vui lòng nhập trạng thái bằng đăng',
            'job_posting_poster.required' => 'Vui lòng nhập chọn poster cho bài đăng'
        ];
    }
}
