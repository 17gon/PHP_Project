<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('__ROOT__', dirname(__FILE__, 2));
require_once(__ROOT__.'/classes/Form.php');

use Form\Form;

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$text = $_POST['message'] ?? '';

$form = new Form();
$userID = $form->getUserOrCreate($name, $email, $text);

if ($userID === "Error message") {
    http_response_code(400);
    header("Location: http://localhost/projectPHP/ups.php");
    exit("Invalid input.");
}

$form->writeComment($userID, $text);
http_response_code(200);
header("Location: http://localhost/projectPHP/thanks.php");
exit();
