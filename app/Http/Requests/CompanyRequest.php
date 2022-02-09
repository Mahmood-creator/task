<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'company.index' => [
                'search' => [
                    'nullable', 'string', 'max:255',
                ],
            ],

            'company.store' => [
                'name' => [
                    'required', 'string', 'max:255',
                ],
                'director_name' => [
                    'required', 'string', 'max:255',
                ],
                'adress' => [
                    'required', 'string', 'max:255',
                ],
                'email' => [
                    'required', 'string', 'max:255',
                ],
                'website_link' => [
                    'required', 'string', 'max:255',
                ],
                'phone' => [
                    'required', 'string', 'max:255',
                ],
                'user_id' => [
                    'required', 'integer', 'exists:users,id',
                ],
            ],

            'company.update' => [
                'name' => [
                    'required', 'string', 'max:255',
                ],
                'director_name' => [
                    'required', 'string', 'max:255',
                ],
                'adress' => [
                    'required', 'string', 'max:255',
                ],
                'email' => [
                    'required', 'string', 'max:255',
                ],
                'website_link' => [
                    'required', 'string', 'max:255',
                ],
                'phone' => [
                    'required', 'string', 'max:255',
                ],
                'user_id' => [
                    'required', 'integer', 'exists:users,id',
                ],
            ],
        ];

        return $rules[
            $this->route()->getName()
        ];
    }
}
