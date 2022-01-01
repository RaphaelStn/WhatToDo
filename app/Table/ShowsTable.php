<?php
namespace App\Table;
use Core\Table\Table;

class ShowsTable extends Table {
    public function getFav($user_id) {
        return $this->query("SELECT * from shows WHERE user_id='$user_id'");
    }
    public function add($user_id, $show_id) {
        return $this-> query("INSERT INTO shows (show_id, user_id) VALUES($show_id, $user_id)");
    }
    public function delete($user_id, $show_id) {
        return $this->query("DELETE FROM shows WHERE user_id=? AND show_id=?", [$user_id, $show_id], true);
    }
}