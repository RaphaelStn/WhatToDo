<?php
namespace App\Table;
use Core\Table\Table;

class PostsTable extends Table {

    public function getPosts($cat) {
        return $this->query("SELECT * from posts WHERE cat='$cat'");
    }
    
    public function save($cat, $content) {
        return $this->query("UPDATE posts SET content=? WHERE cat = '$cat'", [$content], true);
    }
}