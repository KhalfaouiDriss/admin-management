<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "admin_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
?>