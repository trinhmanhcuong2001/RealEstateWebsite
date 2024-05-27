<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            
        ];
    }
    public function messages(): array {
        return [
            'fullname.required' => 'Họ tên không được để trống!',
            'username.required' => 'Tên đăng nhập không được để trống!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Vui lòng nhập đúng định dạng email!',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Độ dài tối thiểu là 8 ký tự!'
        ];
    }
}
