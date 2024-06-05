<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|regex:/^0\d{9}$/'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập nhập tên',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email nhập chưa đúng định dạng',
            'address.required' => 'Bạn chưa nhập địa chỉ giao hàng',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
        ];
    }
}
