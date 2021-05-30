<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateOrCreateRequest extends FormRequest
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
    public function rules()
    {
        $noRequiredOnUpdate = isset($this->id) ? $this->id : 'null';

        return [
            'email' => [
                "required",
                "email",
                "unique:shopkeepers,email,$noRequiredOnUpdate,id",
                "unique:customers,email,$noRequiredOnUpdate,id"
            ],
            'cpf_cnpj' => [
                "required",
                'cpf_cnpj',
                "unique:shopkeepers,cpf_cnpj,$noRequiredOnUpdate,id",
                "unique:customers,cpf_cnpj,$noRequiredOnUpdate,id"
            ],
            'full_name' => [
                "required",
                "min:3"
            ],
            'password' => [
                'nullable',
                'min:6',
                'confirmed',
            ],
            'confirmed_password' => [
                'nullable',
                'min:6',
            ],
        ];
    }

    public function messages()
    {
        return [
            'cpf_cnpj' => 'CPF or CNPJ invalid'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cpf_cnpj' => User::prepareCpfOrCnpj($this->cpf_cnpj)
        ]);
    }
}
