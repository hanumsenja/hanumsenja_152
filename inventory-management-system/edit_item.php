<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE items SET name = :name, quantity = :quantity, price = :price WHERE id = :id");
    $stmt->execute(['name' => $name, 'quantity' => $quantity, 'price' => $price, 'id' => $id]);

    header("Location: view_items.php");
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM items WHERE id = :id");
$stmt->execute(['id' => $id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Item</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $item['name'] ?>" required><br><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?= $item['quantity'] ?>" required><br><br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="<?= $item['price'] ?>" required><br><br>

            <button type="submit" class="btn">Update Item</button>
        </form>
        <br>
        <a href="view_items.php" class="btn">Back to List</a>
    </div>
</body>
</html>