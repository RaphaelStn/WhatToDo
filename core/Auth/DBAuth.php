<?php
namespace Core\Auth;
use \Core\Database\MysqlDatabase;

class DBAuth {

    private $db; 

    public function __construct (MysqlDatabase $db) {
        $this -> db = $db;
    }

    public function login ($username, $password) {
        $user = $this -> db -> prepare ('SELECT * from users WHERE username=?', [$username], null, true);
        if ($user) {
            if(hash_equals($user -> password, crypt($password, 'messier87'))) {
                $_SESSION['auth'] = true;
                $_SESSION['user_id'] = $user->id;
                return true;
            }
        }
        return false;
    }
}