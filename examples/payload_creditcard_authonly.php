<?php
$transaction = $pagarme->transactions()->create([
    'customer' => [
        'code' => '123',//ate 52
        'name' => 'Lucas Silva',
        'email' => 'dev.lucassilva@gmail.com',//ate 64
        'type' => 'individual',//ou company
        'document' => '75173358041',
        'gender' => 'male',//ou female

        'phones' => [
            'mobile_phone' => [
                'country_code' => 55,
                'area_code' => 73,
                'number' => 991344038
            ]
        ]
    ],

    'items' => [
        [
            'amount' => 8900,
            'description' => 'Produto tal',
            'quantity' => 1,
            'code' => 'ABC123'
        ]
    ],

    'payments' => [
        [
            'payment_method' => 'credit_card',
            'amount' => 8900,
            'credit_card' => [
                'operation_type' => 'auth_only',
                'installments' => '1',
                'statement_descriptor' => substr('Lucas Silva Santos',0,13),//ate 13

                'card' => [
                    'number' => '4485283390938684',
                    'holder_name' => 'Lucas Silva Santos',
                    'holder_document' => '75173358041',
                    'exp_month' => '09',//1 a 12
                    'exp_year' => '2024',//
                    'cvv' => '862',
                    'brand' => 'Visa',


                    'billing_address' => [
                        'line_1' => '123, Rua Alguma Coisa, Bairro tal',//numero,rua,bairro
                        'line_2' => '', //complemento
                        'zip_code' => '03189150',
                        'city' => 'São Paulo',
                        'state' => 'SP',
                        'country' => 'BR'
                    ]
                ]
            ],


            'split' => [
                [
                    'amount' => 8900,
                    'recipient_id' => 'rp_wlkKOZ4iZimMP0vX',
                    'type' => 'flat', //flat, percentage,
                    'options' => [
                        'charge_processing_fee' => true,
                        'charge_remainder_fee' => true,
                        'liable' => true
                    ]
                ]
            ]
        ]
    ]
]);

$charge_id =  $transaction->charges[0]->id;
$charge = $pagarme->charges()->charge($charge_id);
echo '<pre>';
echo '<b>Cobrança:</b>';
var_dump($charge);


echo '<hr />';
echo '<b>Transação:</b>';
var_dump($transaction);