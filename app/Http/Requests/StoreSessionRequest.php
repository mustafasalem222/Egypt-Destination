<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class StoreSessionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'الرجاء إدخال البريد الإلكتروني',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'email.exists' => 'لا يوجد حساب مرتبط بهذا البريد',
            'password.required' => 'الرجاء إدخال كلمة المرور',
            'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف',
        ];
    }

    public function authenticate()
    {
        $credentials = $this->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة',
            ]);
        }

        $this->session()->regenerate();
    }

}