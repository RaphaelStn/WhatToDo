<?php
namespace App\Table;
use Core\Table\Table;

class ShowsTable extends Table {
    public function getFav($user_id) {
        return $this->query("SELECT * from shows WHERE user_id='$user_id'");
    }
    public function add($user_id, $ids) {
        return $this-> query("INSERT INTO shows (ids, user_id) VALUES(?, ?)", [$ids, $user_id], true);
    }
    public function delete($user_id, $ids) {
        return $this->query("DELETE FROM shows WHERE user_id=? AND ids=?", [$user_id, $ids], true);
    }
}