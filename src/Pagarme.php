<?php
    namespace Pagarme;

    class Pagarme extends Auth{

        private function getAsset($asset) {
            $asset = 'Pagarme\\Assets\\'.$asset;
            return new $asset($this->secret_key, $this->public_key);
        }

        public function __call($name, $arguments) {
            $asset = ucfirst($name);
            return $this->getAsset($asset);
        }
    }