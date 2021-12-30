<?php
namespace App\Api;
use \Core\Api\Api;

class MoviesApi extends Api {

    public function getTrendingMovies() {
        // getCurl function logic defined in Core/Api, faster use of API's URL
        $this->data = $this->getCurl('https://api.themoviedb.org/3/trending/movie/week?api_key=' . $this-> key_movie . '');
        return array_slice($this->data, 0, 10);
    }

    public function getTrendingShows() {
        $this->data = $this ->getCurl('https://api.themoviedb.org/3/trending/tv/week?api_key=' . $this-> key_movie . '');
        return array_slice($this->data, 0, 10);
    }

    public function getRandomMovie() {
        $data =[];
        $tempData = [];
        for ($i = 1; $i <= 10; $i++) {
            $tempData[$i] = $this->getCurl('https://api.themoviedb.org/3/discover/movie?api_key=' . $this-> key_movie . '&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=' . $i . '&with_watch_monetization_types=flatrate');
            $data = array_merge($data, $tempData[$i]);
        }
        $this->data = $data;
        $this->rand_keys = array_rand($this->data, 1);
        return $this->data[$this->rand_keys];
    }
    
    public function getRandomShow() {
        $data =[];
        $tempData = [];
        for ($i = 1; $i <= 10; $i++) {
            $tempData[$i] = $this->getCurl('https://api.themoviedb.org/3/discover/tv?api_key=' . $this-> key_movie . '&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=' . $i . '&with_watch_monetization_types=flatrate');
            $data = array_merge($data, $tempData[$i]);
        }
        $this->data = $data;
        $this->rand_keys = array_rand($this->data, 1);
        return $this->data[$this->rand_keys];
    }

    public function getIdMovie($id) {
        $this->data = $this ->getCurl('https://api.themoviedb.org/3/movie/'. $id .'?api_key=' . $this-> key_movie . '&language=en-US', true);
        return $this->data;
    }
}