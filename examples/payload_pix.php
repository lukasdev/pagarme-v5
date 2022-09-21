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
            'amount' => 3000,
            'description' => 'Produto tal',
            'quantity' => 2,
            'code' => 'ABC123'
        ]
    ],

    'payments' => [
        [
            'payment_method' => 'pix',
            'amount' => 6000,
            'pix' => [
                'expires_in' => 60*10
            ],


            'split' => [
                [
                    'amount' => 6000,
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

$qrCode =  $transaction->charges[0]->last_transaction->qr_code_url;