<?php
namespace App\Api;
use \Core\Api\Api;

class GamesApi extends Api {

    private $rand_keys;


    public function getTrendingGames() {
        // getCurl function logic defined in Core/Api, faster use of API's URL
        $this->data = $this->getCurl('https://api.rawg.io/api/games?key=' . $this-> key_game . '&metacritic=80,100'); 
        return array_slice($this->data, 0, 10);
    }
    
    public function getRandomGame() {
        $data =[];
        $tempData = [];
        for ($i = 1; $i <= 10; $i++) {
            $tempData[$i] = $this->getCurl('https://api.rawg.io/api/games?key=' . $this-> key_game . '&metacritic=60,100&page='. $i .'');
            $data = array_merge($data, $tempData[$i]);
        }
        $this->data = $data;
        $this->rand_keys = array_rand($this->data, 1);
        return $this->data[$this->rand_keys];
    }

    public function getIdGame($id) {
        $this->data = $this->getCurl('https://api.rawg.io/api/games/'. $id .'?key=' . $this-> key_game . '', true); 
        return $this->data;
    }
}