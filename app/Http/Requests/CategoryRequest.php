<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'priority' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc nhập',
            'name.string' => 'Tên bắt là kiểu chuỗi',
            'name.max' => 'Tên tối đa 100 ký tự',
            'priority.required' => 'Thứ tự bắt buộc nhập',
            'priority.integer' => 'Thứ tự bắt buộc kiểu số',
        ];
    }
}
