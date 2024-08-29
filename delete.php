<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Animal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
$id = !empty($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    $sql = 'delete from products where ID = ?';
    $stmt = $con->prepare($sql);
    $stmt->execute(array($id));

    if ($stmt->rowCount() > 0) { ?>
        <div class="alert alert-success" role="alert">Deleted Successfully</div>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
    <?php
    }
} else { ?>
    <div class="alert alert-danger" role="alert">Invalid ID!</div>
<?php
}

header("Location: index.php");
exit;
?>
</body>
</html>
