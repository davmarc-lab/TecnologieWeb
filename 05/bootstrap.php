<?php
require_once("db/database.php");
require_once("utils/functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "blogtw", 41062);
define("UPLOAD_DIR", "./img/");
?>
