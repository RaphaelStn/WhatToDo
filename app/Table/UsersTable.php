<?php
namespace App\Table;
use Core\Table\Table;

class UsersTable extends Table {
    public function createAccount($fields) {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k=?";
            $attributes[] = $v;
        }
        $sql_part = implode(',',$sql_parts);
        return $this->query("INSERT INTO users SET $sql_part", $attributes, false);
    }
}