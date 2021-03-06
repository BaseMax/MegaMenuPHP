<?php
/*
 * Name: MegaMenuPHP
 * Date: 2022/06/02
 * Author: Max Base
 * Repository: https://github.com/BaseMax/MegaMenuPHP
 * Description: MegaMenuPHP is a simple menu system for PHP that allows you to recursively get menu items and its submenus.
 */

// PDO
$db = new PDO("mysql:host=localhost;dbname=megamenu", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Function: menu
function menu(PDO $db, ?int $parent_id = null)
{
    $items = [];

    $sql = "SELECT `menu_item`.* FROM `menu` INNER JOIN `menu_item` ON `menu_item`.`id` = `menu`.`menu_id` WHERE `menu`.`parent_id`";
    if ($parent_id === null)
        $stmt = $db->prepare("$sql IS NULL;");
    else
        $stmt = $db->prepare("$sql = $parent_id;"); // $parent_id is a trusted value
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_NAMED);

    foreach ($items as &$row) {
        $row["children"] = menu($db, $row["id"]);
        if ($row["children"] === []) unset($row["children"]);
    }

    return $items;
}

$items = menu($db, null);
print_r($items);
