<?php

include 'config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = 'SELECT * FROM products WHERE ID = :id';
    $stmt = $con->prepare($sql);
    $stmt->execute(['id' => $id]);
    $animal = $stmt->fetch();

    if (!$animal) {
        echo "Record not found!";
        exit;
    }
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = 'update products set name = :name, description = :description, price = :price, quantity = :quantity WHERE ID = :id';
    $stmt = $con->prepare($sql);

    if ($stmt->execute(['name' => $name, 'description' => $description, 'price' => $price, 'quantity' => $quantity, 'id' => $id])) {
        header("Location: index.php");
    } else {
        echo "Failed to update record.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Animal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Update Animal</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $animal['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $animal['description']; ?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $animal['price']; ?>">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $animal['quantity']; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>
</body>
</html>
