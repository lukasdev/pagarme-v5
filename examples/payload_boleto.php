<?php

    $payload = [
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
                    'amount' => 2000,
                    'description' => 'Produto tal',
                    'quantity' => 2,
                    'code' => 'ABC123'
                ]
            ],

            'payments' => [
                [
                    'payment_method' => 'boleto',
                    'amount' => 4000,
                    'boleto' => [
                        'bank' => '237',
                        'instructions' => 'Alguma coisa vai escrita aqui',
                        'nosso_numero' => '12346',
                        'type' => 'DM',
                        'document_number' => '654321'
                    ],


                    'split' => [
                        [
                            'amount' => 4000,
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
        ];


    $transaction = '...';
    $status = $tarnsaction->status;//pending
    $url = $transaction->charges[0]->last_transaction->url;