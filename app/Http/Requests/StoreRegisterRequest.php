<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image_url' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'الاسم الكامل',
            'email' => 'البريد الإلكتروني',
            'phone' => 'رقم الهاتف',
            'password' => 'كلمة المرور',
            'image_url' => 'الصورة الشخصية',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'من فضلك أدخل الاسم الكامل.',
            'email.required' => 'من فضلك أدخل البريد الإلكتروني.',
            'email.email' => 'البريد الإلكتروني غير صالح.',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',
            'phone.required' => 'من فضلك أدخل رقم الهاتف.',
            'phone.unique' => 'رقم الهاتف مستخدم بالفعل.',
            'password.required' => 'من فضلك أدخل كلمة المرور.',
            'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف.',
            'password.confirmed' => 'تأكيد كلمة المرور غير مطابق.',
            'image_url.image' => 'حقل الصورة يجب أن يكون صورة.',
            'image_url.mimes' => 'نوع الصورة يجب أن يكون jpg, jpeg, png, أو gif.',
            'image_url.max' => 'حجم الصورة يجب ألا يزيد عن 2 ميجابايت.',
        ];
    }


}