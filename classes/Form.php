<?php
namespace Form;
error_reporting(E_ALL);
ini_set('display_errors', "On");
use Database;
use Exception;

require_once(__ROOT__."/classes/Database.php");
require_once(__ROOT__.'/dataBase/config.php');

class Form extends Database {

    protected $connection;

    public function __construct() {
        $this->connect();

        $this->connection = $this->getConnection();
    }

    public function getUserOrCreate($name, $email, $text): String {
        if(!$this->checkInput($name, $email, $text)) { return "Error message"; }

        /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            return "Error message";
        }*/

        $result = $this->getOrNull($email);
        if ($result == null) {//user exist?
            $result = $this->createUser($name, $email);
        }
        if ($result == null) {//something went wrong?
            return http_response_code(400);
        }
        return $result["id"];
    }

    public function writeComment($userID, $text) {
        $sql = 'INSERT INTO comments(users_id, date, comment) VALUES (:userID, NOW(), :text)';
        $params = ['userID' => $userID, 'text' => $text];
        $result = $this->request($sql, $params);
        if ($result != Exception::class) {//IDK, must work correctly, but not null, because somehow when good response can be null
            http_response_code(200);
        } else {
            http_response_code(404);
            die("Error message");
        }
    }

    public function __destruct() {
        $this->connection = null;
    }

    private function checkInput($name, $email, $text): bool {
        if ($name == "" || $email == "" || $text == "") { return false; }//not empty
        if (strlen($name)>25) { return false; }//not too long
        if (strlen($email)>64) { return false; }
        if (strlen($text)>255) { return false; }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    private function getOrNull($email) {
        $sql = 'SELECT id FROM users WHERE email = :email LIMIT 1';
        $params = array('email' => $email);
        return $this->request($sql, $params);
    }

    private function createUser($name, $email) {
        $sqlAdd = 'INSERT INTO users (email, name) VALUES (:email, :name)';
        $paramsNew = array('email' => $email, 'name' => $name);
        $this->request($sqlAdd, $paramsNew);

        $sqlGet = 'SELECT id FROM users WHERE email = :email LIMIT 1';
        $paramsGet = array('email' => $email);

        return $this->request($sqlGet, $paramsGet)[1];
    }
}