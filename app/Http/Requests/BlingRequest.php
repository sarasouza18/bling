<?php


namespace App\Http\Requests;


use Illuminate\Validation\Rule;

class BlingRequest extends Request
{

    public function rules()
    {

        return [
            'customer' => 'required',
            'customer.name' => 'required|max:255',
            'customer.document' => 'required|digits:14',
            'customer.additional_document' => 'required|numeric',
            'customer.address' => 'required',
            'customer.numeric' => 'required|numeric',
            'customer.zipcode' => 'required|digits:8',
            'customer.city' => 'required|string|max:255',
            'customer.state' => [
                'required',
                'string|max:255',
                Rule::in(
                    [
                        'AC',
                        'AL',
                        'AM',
                        'AP',
                        'BA',
                        'CE',
                        'DF',
                        'ES',
                        'GO',
                        'MA',
                        'MG',
                        'MS',
                        'MT',
                        'PA',
                        'PB',
                        'PE',
                        'PI',
                        'PR',
                        'RJ',
                        'RN',
                        'RO',
                        'RR',
                        'RS',
                        'SC',
                        'SE',
                        'SP',
                        'TO',
                    ]
                ),
            ],
            'customer.country' => 'required|string|max:255',
            'customer.phone' => 'required',
            'customer.email' => 'required|email|max:255',
            'freight.name' => 'required|string|max:255',
            'freight.document' => 'required|digits:14',
            'freight.additional_document' => 'required|numeric',
            'freight.address' => 'required',
            'freight.numeric' => 'required|numeric',
            'freight.zipcode' => 'required',
            'freight.city' => 'required|digits:8',
            'freight.state' => [
                'required',
                'string|max:255',
                Rule::in(
                    [
                        'AC',
                        'AL',
                        'AM',
                        'AP',
                        'BA',
                        'CE',
                        'DF',
                        'ES',
                        'GO',
                        'MA',
                        'MG',
                        'MS',
                        'MT',
                        'PA',
                        'PB',
                        'PE',
                        'PI',
                        'PR',
                        'RJ',
                        'RN',
                        'RO',
                        'RR',
                        'RS',
                        'SC',
                        'SE',
                        'SP',
                        'TO',
                    ]
                ),
            ],
            'freight.country' => 'required|string|max:255',
            'freight.weight' => 'required|float',
            'freight.tag_name' => 'required|string|max:255',
            'order.name' => 'required|string|max:255',
            'order.price' => 'required|float',
            'order.price_freight' => 'required|float',
            'order.price_secure' => 'required|float',
            'order.discount' => 'required|float',
            'order.quantity' => 'required|float',
            'items' => 'required|array|max:50',
            'items.*.description' => 'required|string|max:255',
            'items.*.value' => 'required|float',
            'items.*.sku' => 'required|string|max:255',
            'items.*.qtd' => 'required|numeric',
            'items.*.weight' => 'required|float',




        ];
    }
}