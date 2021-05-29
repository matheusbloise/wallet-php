<?php

namespace App\Http\Requests\FinancialOperationWallet;

use App\Enums\UserTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransferRequest extends FormRequest
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
        return [
            "payer_type" => [
                Rule::in(UserTypeEnum::CUSTOMER)
            ],
            "payer" => [
                'required',
                'numeric'
            ],
            "payee_type" => [
                Rule::in(UserTypeEnum::getAllValues())
            ],
            "payee" => [
                'required',
                'numeric'
            ],
            "value" => [
                'numeric',
                'gt:0'
            ]
        ];
    }
}
