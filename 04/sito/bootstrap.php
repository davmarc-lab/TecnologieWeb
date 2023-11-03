<?php
require_once("db/database.php"); 
$dbh = new DatabaseHelper("localhost", "root", "", "blogtw", 41062); 
define("UPLOAD_DIR", "./upload/");
?>
