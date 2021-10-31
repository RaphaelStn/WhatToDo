<?php
namespace App\Api;
use \Core\Api\Api;

class MoviesApi extends Api {

    public function getTrendingMovies() {
        $this->data = $this->getCurl('https://api.themoviedb.org/3/trending/movie/week?api_key=ab958811b56c320d1a3731b7d8afe657');
        return array_slice($this->data,0, 3);
    }
    public function getTrendingShows() {
        $this->data = $this ->getCurl('https://api.themoviedb.org/3/trending/tv/week?api_key=ab958811b56c320d1a3731b7d8afe657');
        return array_slice($this->data, 0, 3);
    }
}