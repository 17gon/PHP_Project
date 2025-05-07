<?php
define('__ROOT__', dirname(__FILE__, 2));
require_once(__ROOT__.'/classes/Form.php');
use Form\Form;

$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['message'];

$form = new Form();
$userID = $form->getUserOrCreate($name, $email, $text);
if ($userID === "Error message") {
    http_response_code(400);
    exit("Invalid input.");
}
// userID is good
$writted = $form->writeComment($userID, $text);
if ($writted==http_response_code(200)) {
    http_response_code(200);
    header("Location: http://localhost/projectPHP/thanks.php");
}