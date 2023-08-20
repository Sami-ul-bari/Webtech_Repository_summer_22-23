<?php
require 'db_connection.php';

$sql = "SELECT * FROM products WHERE display = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Products</title>
</head>
<body>
    <h1>Display Products</h1>
    
    
    <?php include 'search_products.php'; 
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Profit</th>
            <th>Display</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        
        if (isset($_GET['search'])) {
            $search = $_GET['search'];

            
            $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";

            
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>\n";
                echo "<td>" . $row['name'] . "</td>\n";
                echo "<td>" . $row['profit'] . "</td>\n";
                echo "<td>Yes</td>\n"; 
                echo "<td><a href='edit_products.php?id=" . $row['id'] . "'>Edit </a></td>\n";
                echo "<td><a href='delete_products.php?id=" . $row['id'] . "'>Delete </a></td>\n";
                echo "</tr>\n";
            }
        } else {
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>\n";
                echo "<td>" . $row['name'] . "</td>\n";
                echo "<td>" . $row['profit'] . "</td>\n";
                echo "<td>Yes</td>\n"; 
                echo "<td><a href='edit_products.php?id=" . $row['id'] . "'>Edit </a></td>\n";
                echo "<td><a href='delete_products.php?id=" . $row['id'] . "'>Delete </a></td>\n";
                echo "</tr>\n";
            }
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
