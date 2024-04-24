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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
  

            public function rules()
            {
                $rules = [
                    'fullname' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8|confirmed',
                    'address' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:20',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'role' => 'required|in:2,3,4',
                ];

                // Conditionally add rules based on the value of 'role'
                if ($this->input('role') == 4) {
                    $rules['name'] = 'required|string|max:255';
                    $rules['location'] = 'required|string|max:255';
                    $rules['description'] = 'required|string|max:255';
                    $rules['logo'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
                    $rules['sectors'] = 'required|array|min:1';
                    $rules['sectors.*'] = 'exists:sectors,id'; // Validate each sector ID exists in 'sectors' table
                } elseif ($this->input('role') == 3) {
                    $rules['company_id'] = 'required|exists:companies,id';
                }

                return $rules;
            }
        }

