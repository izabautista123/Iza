<?php
$server = "sql201.infinityfree.com";
$username = "if0_36381471";
$password = "xAlEVubdW1s";
$db_name = "if0_36381471_kitty";

$conn = new mysqli($server, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$conn->autocommit(true);
?>