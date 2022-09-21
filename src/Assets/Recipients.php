<?php
    namespace Pagarme\Assets;
    use Pagarme\Auth;

    class Recipients extends Auth{
        public function create(array $data) {
            $endpoint = 'https://api.pagar.me/core/v5/recipients';
        
            $response = $this->request('POST', $endpoint, $data);
            
            return json_decode($response->getBody()->getContents());
        }


        public function account($recipient_id, array $account) {
            $account['bank_account'] = $account;
            $endpoint = 'https://api.pagar.me/core/v5/recipients/'.$recipient_id.'/default-bank-account';

            
            $response = $this->request('PATCH', $endpoint, $account);
            
            return json_decode($response->getBody()->getContents()); 
        }

        public function balance($recipient_id) {
            $endpoint = 'https://api.pagar.me/core/v5/recipients/'.$recipient_id.'/balance';

            $response = $this->request('GET', $endpoint);
            
            return json_decode($response->getBody()->getContents());
        }

        public function withdraw($recipient_id, $amount) {
            $data = [
                'amount' => $amount
            ];

            $endpoint = 'https://api.pagar.me/core/v5/recipients/'.$recipient_id.'/withdrawals';
            $response = $this->request('POST', $endpoint, $data);

            return json_decode($response->getBody()->getContents());
        }
    }