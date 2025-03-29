<?php
function getHead(){
    $json = file_get_contents("data/pageInfo.json");
    $data = json_decode($json, true);
    $page = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME);
    $arrayCSS = $data[$page]['css'];
    $arrayJS = $data[$page]['js'];
    $title = $data[$page]['title'];

    echo "<head>";
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>' . $title . '</title>';
    foreach ($arrayCSS as $arr) {
        echo "<link rel='stylesheet' href='$arr'>";
    }
    foreach ($arrayJS as $arr) {
        echo "<script src='$arr'></script>";
    }
    echo "</head>";
}