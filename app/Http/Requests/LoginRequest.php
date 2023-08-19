<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|numeric|digits_between:10,11',
            'password' => 'required|string|min:6|max:32',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'phone.required' => 'Số điện thoại là bắt buộc',
            'phone.numeric' => 'Số điện thoại phải là số',
            'phone.digits_between' => 'Số điện thoại phải có độ dài từ 10 đến 11 số',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.string' => 'Mật khẩu phải là chuỗi',
            'password.min' => 'Mật khẩu phải có độ dài từ 6 đến 32 ký tự',
            'password.max' => 'Mật khẩu phải có độ dài từ 6 đến 32 ký tự',
        ];
    }
}
