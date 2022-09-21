<?php
    namespace Pagarme\Assets;
    use Pagarme\Auth;

    class Transactions extends Auth {
        public function create(array $data) {
            $endpoint = 'https://api.pagar.me/core/v5/orders/';

            $response = $this->request('POST', $endpoint, $data);
            return json_decode($response->getBody()->getContents());
        }

        public function get($order_id) {
            $endpoint = 'https://api.pagar.me/core/v5/orders/'.$order_id;

            $response = $this->request('GET', $endpoint);
            return json_decode($response->getBody()->getContents());
        }
    }