<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $buying_price = $_POST["buying_price"];
    $selling_price = $_POST["selling_price"];
    $display = isset($_POST["display"]) ? 1 : 0;

    $profit = $selling_price - $buying_price;

    $sql = "INSERT INTO products (name, profit, display) VALUES ('$name', $profit, $display)";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_products.php");
        echo "Record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
