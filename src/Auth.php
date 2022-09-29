<?php
    namespace Pagarme;
    use \GuzzleHttp\Client;

    class Auth {
        protected $public_key;
        protected $secret_key;
        protected $guzzle;
        protected $auth;

        public function __construct($secret_key, $public_key = null) {
            $this->public_key = $public_key;
            $this->secret_key = $secret_key;
            $this->auth = 'Basic '.base64_encode($this->secret_key.':');
            $this->guzzle = new Client();
        }

        public function request($type, $endpoint, array $data = []) {
            $payload = [
              'http_errors' => false,
              'headers' => [
                'Authorization' => $this->auth,
                'accept' => 'application/json',
                'content-type' => 'application/json',
              ]
            ];

            if(!empty($data)) {
                $payload['body'] = json_encode($data, true);
            }

            $response = $this->guzzle->request($type, $endpoint, $payload);

            if ($response->getStatusCode() <> 200) {
                $output = json_decode($response->getBody()->getContents(), true);

                if (isset($output['errors'])) {
                    $key = array_keys($output['errors'])[0];
                    $message = $key.': '.array_values($output['errors'])[0][0];
                    
                } elseif(isset($output['message'])){
                    $message = $output['message'];
                } else {
                    $message = 'Não foi possivel executar esta ação';
                }

                throw new \Exception($message, 400);
            }

            return $response;
        }
    }