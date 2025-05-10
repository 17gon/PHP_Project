<?php

define('__ROOT__', dirname(__FILE__));

require_once(__ROOT__."/Database.php");
require_once(__ROOT__ . '/config.php');

class CreateReadUpdateDelete extends Database{
    private $connection;

    public function __construct(){
        $this->connect();

        $this->connection = $this->getConnection();
    }


    public function __destruct() {
        $this->connection = null;
    }

    public function create($content) {
        $sql = '';

        $result = $this->request($sql, array("content" => $content));
    }
    public function read(): string {
        $sql = '';

        $result = $this->request($sql, null, true);
        $out = "<table> <tr><th>ID</th><th>Content</th></tr>";
        foreach($result as $row){
            $id = $row['id'];
            $content = $row['content'];
            $out.="<tr><td>".$id."</td><td>".$content."</td></tr>";

        }
        $out .= "</table>";
        return $out;
    }

    public function update($id, $content) {
        $sql = '';
        $result = $this->request($sql, array("content" => $content, "id" => $id));
    }

    public function delete($id) {
        $sql = '';

        $result = $this->request($sql, array('id' => $id));
    }
}