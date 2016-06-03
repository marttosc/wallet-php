<?php

namespace Wallet\Http\Requests;

use Wallet\Http\Requests\Request;

class UpdateCardRequest extends Request
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
            'closes_at' => 'required|date_format:"d/m/Y"',
            'limit'     => 'required|numeric|min:500',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'closes_at.required'    => 'Informe o próximo fechamento do cartão',
            'closes_at.date_format' => 'A data de fechamento deve estar no formato "d/m/Y"',

            'limit.required'        => 'Informe o limite do cartão',
            'limit.numeric'         => 'O limite deve conter apenas números',
            'limit.min'             => 'O limite mínimo do cartão deve ser de R$ 500',
        ];
    }
}
