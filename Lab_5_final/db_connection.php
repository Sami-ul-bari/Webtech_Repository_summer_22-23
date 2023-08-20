<?php
$hostname = "localhost";
$username = "webtech";
$password = "1234";
$database = "product_db";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>