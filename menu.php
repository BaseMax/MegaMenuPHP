<?php
// PDO
$db = new PDO("mysql:host=localhost;dbname=megamenu", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

function menu($parent_id = null)
{
    global $db;
    $items = [];

    if ($parent_id === null)
        $stmt = $db->prepare("SELECT * FROM `menu` WHERE parent_id IS NULL;");
    else
        $stmt = $db->prepare("SELECT * FROM `menu` WHERE parent_id = $parent_id;"); // $parent_id is a trusted value
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
