<?php

/**transfer days, weekly: 1,2,3,4 ou 5**/
        /**transfer days, montly: 1 ate 31**/
        /**transfer days, daily: 0**/
        $output = $pagarme->recipients()->create([
            'name' => 'Nicolas Alguma Coisa',
            'email' => 'nicolas@gmail.com',
            'description' => 'Descrição do cara',
            'document' => '38605841036',
            'type' => 'individual',
            'code' => 15,
            'default_bank_account' => [
                'holder_name' => 'Nicolas Alguma Coisa',
                'bank' => 237,
                'branch_number' => 1234,
                'branch_check_digit' => 5,
                'account_number' => 1234567890123,
                'account_check_digit' => 12,
                'holder_type' => 'individual',
                'holder_document' => '38605841036',
                'type' => 'savings'
            ],

            'transfer_settings' => [
                'transfer_enabled' => true,
                'transfer_interval' => 'Daily',
                'transfer_day' => 0
            ],

            'automatic_anticipation_settings' => [
                'enables' => true,
                'type' => '1025',
                'volume_percentage' => '100',
                'delay' => '6'
            ]
        ]);