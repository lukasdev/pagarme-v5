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
                    'amount' => 1500,
                    'description' => 'Produto tal',
                    'quantity' => 2,
                    'code' => 'ABC123'
                ]
            ],

            'payments' => [
                [
                    'payment_method' => 'credit_card',
                    'amount' => 3000,
                    'credit_card' => [
                        'operation_type' => 'auth_and_capture',
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
                                'line_1' => '123, Rua alguma coisa, Bairro tal',//numero,rua,bairro
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
                            'amount' => 3000,
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