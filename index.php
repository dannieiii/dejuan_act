<?php

include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1> Animal Table</h1>
    <?php
    $sql = 'select * from products';

    $stmt = $con->prepare($sql);

    $stmt->execute();

    //pangfetch
    $animals = $stmt->fetchAll();
    ?>
   <table class= "table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Update or Delete</th>
        </tr>
    </thead>
    <tbody>
                		<?php foreach($animals as $animal): ?>
                			<tr>
                				<td><?php echo $animal['ID']; ?></td>
                				<td><?php echo $animal['name']; ?></td>
                				<td><?php echo $animal['description']; ?></td>
                                <td><?php echo $animal['price']; ?></td>
                                <td><?php echo $animal['quantity']; ?>
                                <td><?php echo $animal['created_at']; ?>
                                <td><?php echo $animal['updated_at']; ?>
                                <td><a role="button" href="update.php?id=<?php echo $animal['ID']; ?>">Update</a>&nbsp;<a role="button" href="delete.php?id=<?php echo $animal['ID']; ?>">Delete</a></td>

                			</tr>
                		<?php endforeach ?>
                	</tbody>
   </table> 
   <a href="create.php"  role="button">Add New</a>
</body>
</html>