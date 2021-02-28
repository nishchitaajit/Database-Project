<?php
//DATABASE CONNECTION
$host = "localhost";
$username = "root";
$password = "";
$database = "Project";

$sql = mysqli_connect($host, $username, $password, $database) or die('Could not connect');
$set_sql = mysqli_query($sql, "SET sql_mode='STRICT_TRANS_TABLES,ANSI_QUOTES';");
?>