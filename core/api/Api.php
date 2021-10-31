<?php
namespace Core\Api;

class Api {

    public function getCurl($url) {
        $this->curl = curl_init($url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true );
        $data = curl_exec($this->curl);
        if ($data === false) {
            var_dump(curl_error($this->curl));
        } else {
            $data=json_decode($data, true);
            $data = $data['results'];
            return $data;
        }
        curl_close($curl);
    }
}