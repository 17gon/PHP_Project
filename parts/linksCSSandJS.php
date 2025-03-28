<?php
function getCSSandJS(){
    $json = file_get_contents("data/cssAndJsBind.json");
    $data = json_decode($json, true);
    $page = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME);
    $arrayCSS = $data['css'][$page];
    $arrayJS = $data['js'][$page];
    foreach ($arrayCSS as $arr) {
        echo "<link rel='stylesheet' href='$arr'>";
    }
    foreach ($arrayJS as $arr) {
        echo "<script src='$arr'></script>";
    }
}