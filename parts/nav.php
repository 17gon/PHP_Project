<?php
function generateNavbar(): string {
    $rawMenu = generateMenu("navbar");
    $formedMenu = selectN(3, $rawMenu);
    $bakedMenu = "";

    $bakedMenu .= "<nav>";
    $bakedMenu .= '<div id="burgerIcon">'
            .'<img src="img/hamburgerIMG.png" alt="hamburgerIMG" onclick="toggleNavBar()">'
        .'</div>';
    $bakedMenu .='<div id="links">'
            .'<a href="main.php"><img src="img/icon.png" alt="" style="height: 45px;"></a>';
    foreach ($formedMenu as $menu => $menuData) {
        $bakedMenu .= '<a href="'.$menuData['path'].'">'.$menuData['name'].'</a>';
    }
    $bakedMenu .= '</div>';
    $bakedMenu .= '<div id="changeTheme">'
        .'<label class="switch">'
                .'<input type="checkbox" onclick="changeTheme()">'
                .'<span class="slider round"></span>'
            .'</label>'
        .'</div>';
    $bakedMenu .= '</nav>';

    return $bakedMenu;
}

function selectN(int $n, array $menus): array {
    $ready = array();
    $dont = basename($_SERVER['PHP_SELF']);//I do not want to see a link to it's self
    if (count($menus) < $n) {$n = count($menus);}
    $count = 0;
    foreach ($menus as $key => $menu) {
        if ($count >= $n) break;
        if ($menu['path'] != $dont) {
            $ready[] = $menu;
            $count++;
        }
    }
    return $ready;
}

function generateMenu(string $type): array {
    $menu = array();
    if($type === "navbar") {
        $json = file_get_contents("data/navbars.json");
        $menu = json_decode($json, true);
    }
    return $menu;
}