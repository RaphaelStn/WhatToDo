<?php
namespace App\Table;
use Core\Table\Table;

class FavoritesTable extends Table {
    public function getFav($user_id, $cat) {
        return $this->query("SELECT * from favorites WHERE user_id='$user_id' AND cat='$cat'");
    }
    public function add($user_id, $ids, $cat) {
        return $this-> query("INSERT INTO favorites (ids, user_id, cat) VALUES(?, ?, ?)", [$ids, $user_id, $cat], true);
    }
    public function delete($user_id, $ids, $cat) {
        return $this->query("DELETE FROM favorites WHERE user_id=? AND ids=? AND cat=?", [$user_id, $ids, $cat], true);
    }
}