<?php
namespace App\Api;
use \Core\Api\Api;

class GamesApi extends Api {

    private $rand_keys;


    public function getTrendingGames() {
        $this->data = $this->getCurl('https://api.rawg.io/api/games?key=' . $this-> key_game . '&metacritic=80,100');
        return array_slice($this->data, 0, 10);
    }
    public function getRandomGame() {
        $data =[];
        $tempData = [];
        for ($i = 1; $i <= 8; $i++) {
            $tempData[$i] = $this->getCurl('https://api.rawg.io/api/games?key=' . $this-> key_game . '&metacritic=60,100&page='. $i .'');
            $data = array_merge($data, $tempData[$i]);
        }
        $this->data = $data;
        $this->rand_keys = array_rand($this->data, 1);
        return $this->data[$this->rand_keys];
    }
}