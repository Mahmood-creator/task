<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
     /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'auth.login' => [
                'email' => [
                    'required', 'string',
                ],

                'password' => [
                    'required', 'string',
                ],
            ],

            'auth.register' => [
                'email' => [
                    'required', 'string',
                ],
                'name' => [
                    'required', 'string',
                ],

                'password' => [
                    'required', 'string',
                ],
            ],

            'auth.logout' => [
                //
            ],
        ];

        return $rules[
            $this->route()->getName()
        ];
    }
}
