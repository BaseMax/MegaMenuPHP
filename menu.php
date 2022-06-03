<?php
// PDO
$db = new PDO("mysql:host=localhost;dbname=megamenu", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

function menu($parent_id = null)
{
    global $db;
    $items = [];

    $sql = "SELECT `menu_item`.* FROM `menu` INNER JOIN `menu_item` ON `menu_item`.`id` = `menu`.`menu_id` WHERE parent_id ";
    if ($parent_id === null)
        $stmt = $db->prepare("$sql IS NULL;");
    else
        $stmt = $db->prepare("$sql = $parent_id;"); // $parent_id is a trusted value
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_NAMED);

    foreach ($items as &$row) {
        $row["children"] = menu($row["id"]);
        if ($row["children"] === []) unset($row["children"]);
    }

    return $items;
}

$items = menu();
print_r($items);
