<?php
    namespace Pagarme\Assets;
    use Pagarme\Auth;

    class Subscriptions extends Auth {
        public function create(array $data) {
            $endpoint = 'https://api.pagar.me/core/v5/subscriptions/';

            $response = $this->request('POST', $endpoint, $data);
            return json_decode($response->getBody()->getContents());
        }

        public function get($subscription_id) {
            $endpoint = 'https://api.pagar.me/core/v5/subscriptions/'.$subscription_id;

            $response = $this->request('GET', $endpoint);
            return json_decode($response->getBody()->getContents());
        }

        public function changeCard($subscription_id, array $data) {
            $endpoint = 'https://api.pagar.me/core/v5/subscriptions/'.$subscription_id.'/card';

            $response = $this->request('PATCH', $endpoint, $data);
            return json_decode($response->getBody()->getContents());
        }

        public function unsubscribe($subscription_id) {
            $endpoint = 'https://api.pagar.me/core/v5/subscriptions/'.$subscription_id.'';

            $response = $this->request('DELETE', $endpoint, [
                'cancel_pending_invoices' => true
            ]);
            
            return json_decode($response->getBody()->getContents());
        }
    }