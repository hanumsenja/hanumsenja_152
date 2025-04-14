<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'includes/db.php';

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO items (name, quantity, price) VALUES (:name, :quantity, :price)");
    $stmt->execute(['name' => $name, 'quantity' => $quantity, 'price' => $price]);

    header("Location: view_items.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Item</h1>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required><br><br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" required><br><br>

            <button type="submit" class="btn">Add Item</button>
        </form>
        <br>
        <a href="index.html" class="btn">Back to Home</a>
    </div>
</body>
</html>