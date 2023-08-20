<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_products.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
