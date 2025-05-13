<?php

define('__ROOT__', dirname(__FILE__, 2));

require_once(__ROOT__."/classes/Database.php");
require_once(__ROOT__ . '/dataBase/config.php');

class CreateReadUpdateDelete extends Database{
    private $connection;

    public function __construct(){
        $this->connect();

        $this->connection = $this->getConnection();
    }

    public function __destruct() {
        $this->connection = null;
    }

    public function create($value) {
        $sql = 'INSERT INTO crud (value) VALUES (:value)';

        $result = $this->request($sql, array("value" => $value));
    }
    public function read(): string {
        $sql = 'SELECT * FROM crud WHERE 1;';
        $result = $this->request($sql, null, true);
        $out = "<table> <tr><th>ID</th><th>value</th></tr>";
        foreach($result as $row){
            $id = $row['id'];
            $value = $row['value'];
            $out.="<tr><td>".$id."</td><td>".$value."</td></tr>";
        }
        $out .= "</table>";
        return $out;
    }
    public function update($id, $value) {
        $sql = 'UPDATE crud SET value = :value WHERE id = :id;';
        $result = $this->request($sql, array("value" => $value, "id" => $id));
    }
    public function delete($id) {
        $sql = 'DELETE FROM crud WHERE id = :id;';

        $result = $this->request($sql, array('id' => $id));
    }
}