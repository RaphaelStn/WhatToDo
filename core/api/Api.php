<?php
namespace Core\Api;

class Api {
    public function __construct($key_movie, $key_game) {
        $this -> key_movie = $key_movie;
        $this -> key_game = $key_game;
    }

    // Curl function to fetch API
    public function getCurl($url, $search = false) {
        $this->curl = curl_init($url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true );
        $this->data = curl_exec($this->curl);
        if ($this->data === false) {
            var_dump(curl_error($this->curl));
        } else {
            if($search == true) {
                $this->data=json_decode($this->data, true);
                return $this->data;
            } else {
                $this->data=json_decode($this->data, true);
                $this->data = $this->data['results'];
                return $this->data;
            }
        }
        curl_close($this->curl);
    }
}