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
        <h1>Edit product</h1>
        <!-- form -->
        <div class="row">
            <div class="col">
                <form role="form" class="php-email-form" id="edit-form">
                    <div class="form-group">
                        <input type="text" name="id" class="form-control" hidden value="<?=$product['id'];?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name product" required="" value="<?=$product['name'];?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description" required="" value="<?=$product['description'];?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" required="" value="<?=$product['price'];?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="image" id="image" placeholder="Image url" required="" value="<?=$product['image'];?>">
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-secondary" type="submit" name="edit">Edit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
<script src="./assets/js/jquery-1.11.0.min.js"></script>
<script src="./assets/js/custom.js"></script>
</html>