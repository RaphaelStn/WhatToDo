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
            if($user -> password === sha1($password)) {
                $_SESSION['auth'] = true;
                $_SESSION['username'] = $user -> username;
                return true;
            }
        }
        return false;
    }

    public function logged() {
       return isset($_SESSION['auth']);
    }
}