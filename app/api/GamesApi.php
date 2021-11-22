<?php
namespace App\Api;
use \Core\Api\Api;

class GamesApi extends Api {
    public function getTrendingGames() {
        $this->data = $this->getCurl('https://api.rawg.io/api/games?key=420c1efcd72a4af893d68e8e8378211d&dates=2019-09-01,2019-09-30&platforms=18,1,7');
        shuffle($this->data);
        return array_slice($this->data, 0, 4);
    }
}