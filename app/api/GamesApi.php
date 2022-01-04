<?php
namespace App\Api;
use \Core\Api\Api;

class GamesApi extends Api {

    //get Top rated videos games via getCurl model in Core/Api/Api.php and shuffle the data, return 20 results
    public function getTrendingGames() {
        $this->data = $this->getCurl('https://api.rawg.io/api/games?key=' . $this-> key_game . '&metacritic=80,100'); 
        shuffle($this->data);
        return array_slice($this->data, 0, 20);
    }
    
    //Get a random game via getCurl Model in Core/Api/Api.php
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

    //Search a game with his unique ID.
    public function getIdGame($id) {
        $this->data = $this->getCurl('https://api.rawg.io/api/games/'. $id .'?key=' . $this-> key_game . '', true); 
        return $this->data;
    }
}