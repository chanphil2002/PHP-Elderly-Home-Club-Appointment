<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "wdt";

$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>