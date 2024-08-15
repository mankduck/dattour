<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'email' => 'required|email|unique:accounts',
            'password' => 'required',
            'username' => 'required|string|regex:/^[a-z0-9]+$/|max:255|unique:accounts,username',
            're_password' => 'required|same:password',
            'publish' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập vào ô email.',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
            'email.unique' => 'Email đã tồn tại, vui lòng chọn email khác.',
            'username.regex' => 'Username chỉ được chứa chữ cái thường và số, không có dấu cách hay ký tự đặc biệt.',
            'username.unique' => 'Username này đã được sử dụng.',
            'password.required' => 'Bạn chưa nhập vào ô mật khẩu.',
            'password.min' => 'Mật khẩu phải tối thiểu 6 kí tự.',
            'password.max' => 'Mật khẩu phải tối thiểu 10 kí tự.',
            're_password.required' => 'Bạn chưa nhập vào ô nhập lại mật khẩu.',
            're_password.same' => 'Mật khẩu và xác nhận mật khẩu không khớp.',
            'publish.required' => 'Bạn chưa chọn tình trạng.',
        ];
    }
}
