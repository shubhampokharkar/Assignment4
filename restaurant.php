<?php
header("Content-type: application/json");
require 'Data.php';
// include 'Data.php';

$req = $_GET['req'] ?? null;

if ($req) {
    $jsonData = file_get_contents("restaurant.json");
    $dataList = json_decode($jsonData, true)['menu_items'];
    try {
        $menuItem = new MenuItem($dataList);
    } catch (Exception $th) {
        echo json_encode([$th->getMessage()]);
        return;
    }
}

switch ($req) {
    case 'menu_list':
        echo $menuItem->getMenuList();
        break;

    case "menu_item":
        $name = $_GET['name'] ?? null;
        echo $menuItem->getMenuItembyName($name);
        break;
    
    default:
        echo json_encode(["In-valid request"]);
        break;
}

?>