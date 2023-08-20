<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
</head>
<body>
    <h1>ADD PRODUCT</h1>
    <form action="save_product.php" method="POST">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="buying_price">Buying Price:</label>
        <input type="number" id="buying_price" name="buying_price" step="0.01" required><br><br>
        
        <label for="selling_price">Selling Price:</label>
        <input type="number" id="selling_price" name="selling_price" step="0.01" required><br><br>
        
        <label for="display">Display:</label>
        <input type="checkbox" id="display" name="display"><br><br>
        
        <input type="submit" value="Save">
    </form>

</body>
</html>

