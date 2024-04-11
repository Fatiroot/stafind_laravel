<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationUpdateRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if ($this->input('start_date') && strtotime($value) <= strtotime($this->input('start_date'))) {
                        $fail('The end date must be greater than the start date.');
                    }
                },
            ],
            'etablissement' => 'required|string|max:255',

        ];
    }
}
