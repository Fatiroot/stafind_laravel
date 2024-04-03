<?php

namespace App\Http\Requests;

use SebastianBergmann\Type\TrueType;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|string|min:8|confirmed',
            'password_confirmation'=>'required|string|min:8',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|boolean',
            'image'=> 'required|mimes:jpg,jpeg,png,gif',
            'role' => 'required',


        ];

    }
}
