<?php
echo "<div class='buttons'>";
    $page = basename($_SERVER['PHP_SELF']);
    $json = file_get_contents('data/buttons_calc.json');
    $buttons = json_decode($json, true);

    $option = "";
    if ($page == "simple_calc.php") {
        $option = "simple_calc";
    } else if ($page == "advanced_calc.php") {
        $option = "advanced";
    }

    foreach ($buttons[$option] as $group) {
        foreach ($group as $text => $fung) {
            if ($option != "simple_calc") {
                echo "<button onclick=\"$fung\"> $text </button>";
            } else {
                $cls = "btn";
                if ($text == "+" || $text == "-" || $text == "*" || $text == "/") {
                    $cls.="_oper";
                }
                echo "<button class=\"$cls\" onclick=\"$fung\">$text</button>";
            }
        }
    }
    echo "</div>";