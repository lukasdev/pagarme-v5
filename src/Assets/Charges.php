<?php
    namespace Pagarme\Assets;
    use Pagarme\Auth;

    class Charges extends Auth{
        public function charge($charge_id) {
            $endpoint = 'https://api.pagar.me/core/v5/charges/'.$charge_id.'/capture';

            $request = $this->request('POST', $endpoint);
            return json_decode($request->getBody()->getContents());
        }
    }