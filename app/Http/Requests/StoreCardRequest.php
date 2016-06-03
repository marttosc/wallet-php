<?php

namespace Wallet\Http\Requests;

use Wallet\Http\Requests\Request;

class StoreCardRequest extends Request
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
            'flag'       => 'required',
            'card'       => [
                'required',
                'regex:/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/',
                'unique:cards',
            ],
            'cvc'        => 'required|numeric|min:3',
            'expires_in' => 'required|date_format:"m/Y"',
            'closes_at'  => 'required|date_format:"d/m/Y"',
            'limit'      => 'required|numeric|min:500',
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
            'flag.required'          => 'Informe a bandeira do cartão',

            'card.required'          => 'Informe o número do cartão',
            'card.regex'             => 'Informe somente os números do cartão, sem espaço ou traços',
            'card.unique'            => 'Este cartão já foi cadastrado',

            'cvc.required'           => 'Informe o código de segurança',
            'cvc.numeric'            => 'O código só deve conter números',
            'cvc.min'                => 'O código de segurança deve conter, no mínimo, três caracteres',

            'expires_in.required'    => 'Informe a validade do cartão',
            'expires_in.date_format' => 'A validade do cartão deve estar no formato "m/Y"',

            'closes_at.required'     => 'Informe o próximo fechamento do cartão',
            'closes_at.date_format'  => 'A data de fechamento deve estar no formato "d/m/Y"',

            'limit.required'         => 'Informe o limite do cartão',
            'limit.numeric'          => 'O limite deve conter apenas números',
            'limit.min'              => 'O limite mínimo do cartão deve ser de R$ 500',
        ];
    }
}
