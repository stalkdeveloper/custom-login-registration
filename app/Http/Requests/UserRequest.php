<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'profile_img'           => 'required|image|mimes:jpeg,png,jpg',
            'name'                     => 'required|string|max:255',
            'email'                     => 'required|email|unique:users,email',
            'mobile'                  => 'required|numeric|unique:users,mobile',
            'father_name'         => 'required|string|max:255',
            'mother_name'       => 'required|string|max:255',
            'address'                 => 'required|string|max:255',
            'city'                        => 'required|string|max:255',
            'post_code'             => 'required|numeric|min:6|unique:users,post_code',
            'password'              => 'required|string|min:8|max:12',
            'confirm_password'=> 'required|string|min:8|max:12',
        ];
    }
}
