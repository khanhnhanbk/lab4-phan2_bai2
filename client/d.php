<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $api_url = 'http://localhost/api/product/getOne.php';
    $json_data = file_get_contents($api_url . '?id=' . $id);
    $product = json_decode($json_data, true)[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container-fluid">
        <h1>Delete product</h1>
        <!-- info -->
        <div class="row">
            <div class="col">
                <h3>Name: <?= $product['name']; ?></h3>
                <p>Description: <?= $product['description']; ?></p>
                <p>Price: <?= $product['price']; ?></p>
                <img src="<?= $product['image']; ?>" alt="product image">
                <form id="delete-form">
                    <input type="text" name="id" hidden value="<?= $product['id']; ?>">
                    <button type="submit" name="btn-delete" class="btn btn-danger">Confirm delete</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="./assets/js/jquery-1.11.0.min.js"></script>
<script src="./assets/js/custom.js"></script>
</html>