<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|regex:/^[\pL\s]+$/u',
            'phone' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập vào ô họ tên.',
            'name.string' => 'Họ tên phải là 1 chuỗi kí tự.',
            'name.regex' => 'Họ tên chỉ được nhập kí tự chữ cái.',
            'phone.required' => 'Bạn chưa nhập vào ô số điện thoại.',
        ];
    }
}