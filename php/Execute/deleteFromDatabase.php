<?php

include_once("../Model/Database.class.php");

$id = $_GET['id'];
$table = $_GET['table'];
$page = $_GET['page'];
$db = new DataBase("localhost", "root", "", "hurtownia");
$db->deleteFromDatabase($table, $id);

header("Location: ../../pages/$page.php");

?>