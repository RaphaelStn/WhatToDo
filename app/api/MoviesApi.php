<?php
namespace App\Api;
use \Core\Api\Api;

class MoviesApi extends Api {

    public function getTrendingMovies() {
        $this->data = $this->getCurl('https://api.themoviedb.org/3/trending/movie/week?api_key=' . $this-> key_movie . '');
        shuffle($this->data);
        return array_slice($this->data, 0, 4);
    }
    public function getTrendingShows() {
        $this->data = $this ->getCurl('https://api.themoviedb.org/3/trending/tv/week?api_key=' . $this-> key_movie . '');
        shuffle($this->data);
        return array_slice($this->data, 0, 4);
    }
}