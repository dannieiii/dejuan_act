<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
			
        if(isset($_POST['submit'])) {

					$name = $_POST['name'];
					$description = $_POST['des'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];

					$sql = 'insert into products(name, description, price, quantity) values (?, ?, ?, ?)';

					
					$stmt = $con->prepare($sql);

					$stmt->execute(array($name, $description, $price, $quantity));

					if($stmt->rowCount() > 0) { ?>
						<div class="alert alert-success" role="alert">Saved Successfully</div>
					<?php } else { ?>
						<div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
					<?php
					}
				}
				?>
				<h2>Add Animal</h2>
				  <form action="" method="POST">
				    <div class="form-group">
				      <label for="email">Name:</label>
				      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
				    </div>
				    <div class="form-group">
				      <label for="pwd">Description:</label>
				      <input type="text" class="form-control" id="des" placeholder="Enter description" name="des">
				    </div>
                    <div class="form-group">
				      <label for="pwd">Price:</label>
				      <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
				    </div>
                    <div class="form-group">
				      <label for="pwd">Quantity:</label>
				      <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
				    </div>
				    <button type="submit" name="submit" class="btn btn-primary">Save</a>
				  </form>
</body>
</html>