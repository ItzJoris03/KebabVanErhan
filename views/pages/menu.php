<link rel="stylesheet" href="<?=$dir?>/assets/styles/menu/style.css">
<div class="bttm_overlay"></div>
<?php

$types = $db->getMenuTypes();


echo "<div class='menu'>";
foreach($types as $index => $array) {
    $menu = $db->getMenu($array['Id']);
    $type = $array['Type'];
    echo "<table class='type'><tr>";
    echo "<th>$type</th>";
    // debug($menu);
    if(is_null($menu[0]["PriceRegular"])) {
        echo "<th>KALF</th>";
        echo "<th>KIP</th>";
        echo "<th>MIX</th>";
    }
    echo "</tr>";
    foreach($menu as $index => $array) {
        $filteredArray = array_filter($array);
        echo "<tr>";
        foreach($filteredArray as $type) {
            if(substr_count($type, '.')) {
                $type = "€$type";
                if(substr($type, strpos($type, '.')) == "00") {
                    $type = substr_replace($type, '-', strpos($type, '.') + 1);
                }
            }
            echo "<td>$type</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
echo "</div>";

?>