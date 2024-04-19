<?php

namespace Webkul\Shop\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Webkul\Customer\Facades\Captcha;

class RegistrationRequest extends FormRequest
{
    /**
     * Define your rules.
     *
     * @var array
     */
    private $rules = [
        'first_name' => 'string|required',
        'last_name'  => 'string|required',
        'email'      => 'email|required|unique:customers,email',
        'password'   => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Captcha::getValidations($this->rules);
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return array_merge(Captcha::getValidationMessages(), [
            'first_name.required' => 'Nama depan diperlukan.',
            'last_name.required'  => 'Nama belakang diperlukan.',
            'email.required'      => 'Email diperlukan.',
            'email.email'         => 'Format email tidak valid.',
            'email.unique'        => 'Email sudah digunakan.',
            'password.required'   => 'Password diperlukan.',
            'password.confirmed'  => 'Konfirmasi password tidak cocok.',
            'password.min'        => 'Password harus minimal 8 karakter.',
            'password.regex'      => 'Password harus mengandung huruf besar, huruf kecil, angka, dan karakter spesial.',
        ]);
    }
}
