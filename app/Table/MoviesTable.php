<?php
namespace App\Table;
use Core\Table\Table;

class MoviesTable extends Table {
    public function getFav($user_id) {
        return $this->query("SELECT * from movies WHERE user_id='$user_id'");
    }
    public function add($user_id, $ids) {
        return $this-> query("INSERT INTO movies (ids, user_id) VALUES($ids, $user_id)");
    }
    public function delete($user_id, $ids) {
        return $this->query("DELETE FROM movies WHERE user_id=? AND ids=?", [$user_id, $ids], true);
    }
}