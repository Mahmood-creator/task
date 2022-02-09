<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
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
            'worker.index' => [
                'search' => [
                    'nullable', 'string', 'max:255',
                ],
            ],

            'worker.store' => [
                'first_name' => [
                    'required', 'string', 'max:255',
                ],
                'last_name' => [
                    'required', 'string', 'max:255',
                ],
                'adress' => [
                    'required', 'string', 'max:255',
                ],
                'middle_name' => [
                    'required', 'string', 'max:255',
                ],
                'position' => [
                    'required', 'string', 'max:255',
                ],
                'phone' => [
                    'required', 'string', 'max:255',
                ],
                'company_id' => [
                    'required', 'integer', 'exists:companies,id',
                ],
            ],

            'worker.update' => [
                'first_name' => [
                    'required', 'string', 'max:255',
                ],
                'last_name' => [
                    'required', 'string', 'max:255',
                ],
                'adress' => [
                    'required', 'string', 'max:255',
                ],
                'middle_name' => [
                    'required', 'string', 'max:255',
                ],
                'position' => [
                    'required', 'string', 'max:255',
                ],
                'phone' => [
                    'required', 'string', 'max:255',
                ],
                'company_id' => [
                    'required', 'integer', 'exists:companies,id',
                ],
            ],
        ];

        return $rules[
            $this->route()->getName()
        ];
    }
}
