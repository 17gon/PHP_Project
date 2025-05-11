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

        $emailSequence = explode('@', $email);
        if (count($emailSequence) !== 2) {
            http_response_code(400);
            return "Invalid email format";
        }
        $emailLocal = $emailSequence[0];
        $emailDomain = $emailSequence[1];

        $result = $this->getOrNull($emailLocal);
        if ($result == null) {//user exist?
            $result = $this->createUser($name, $emailLocal);
        }
        if ($result == null) {//something went wrong?
            return http_response_code(400);
        }
        return $result["clientID"];
    }

    public function writeComment($userID, $text) {
        $sql = 'INSERT INTO comments(clientID, date, text) VALUES (:userID, NOW(), :text)';
        $params = array();
        $params['userID'] = $userID;
        $params['text'] = $text;
        $result = $this->request($sql, $params);
        if ($result != Exception::class) {//idk, must work correctly, but not null, because somehow when good response can be null
            http_response_code(200);
        } else {
            http_response_code(404);
            die('Error while connecting to database!');
        }
    }

    public function __destruct() {
        $this->connection = null;
    }

    private function checkInput($name, $email, $text): bool {
        if ($name == "" || $email == "" || $text == "") { return false; }//not empty
        if (strlen($name)>25) { return false; }//not too long
        if (strlen($text)>255) { return false; }

        $emailSequence = explode('@', $email);
        $emailLocal = $emailSequence[0];
        $emailDomain = $emailSequence[1];
        if ($emailLocal == "" || strlen($emailLocal)>63) { return false; }//not an "@anything" and not impossible length
        if ($emailDomain == "" || strlen($emailDomain)>255) { return false; }//same what before but for domain part

        return true;
    }

    private function getOrNull($email) {
        $sql = 'SELECT "id" FROM "users" WHERE email = :email LIMIT 1';
        $testQuery = $this->connection->prepare($sql);
        $params = array('email' => $email);
        return $this->request($testQuery, $params);
    }

    private function createUser($name, $email) {
        $sqlAdd = 'INSERT INTO "users" (email, name) VALUES (:email, :name)';
        $paramsNew = array('email' => $email, 'name' => $name);
        $this->request($sqlAdd, $paramsNew);

        $sqlGet = 'SELECT "id" FROM "users" WHERE email = :email LIMIT 1';
        $user = $this->connection->prepare($sqlGet);
        $paramsGet = array('email' => $email);

        return $this->request($paramsGet, $sqlGet)[1];//first hasn't result
    }
}