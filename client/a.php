<?php
// get from api
$api_url = 'http://localhost/api/product/getAll.php';
$json_data = file_get_contents($api_url);
$products = json_decode($json_data, true);
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
        <div class="row justify-content-center">
            <div class="col-4">
                <h1>Read product</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($products as $product) :
                            ?>
                                <tr>
                                    <td><?= $product['id'] ?></td>
                                    <td><?= $product['name'] ?></td>
                                    <td><?= $product['description'] ?></td>
                                    <td><?= $product['price'] ?> VND</td>
                                    <td><img src="<?= $product['image'] ?>" alt="product_image" width="50px"></td>
                                    <td>
                                        <div class="btn bg-light">Read</div>
                                        <!-- edit button -->
                                        <a class="btn btn-primary" href="c.php?id=<?= $product['id'] ?>">Edit</a>
                                        <!-- delete button -->
                                        <a class="btn btn-danger" href="d.php?id=<?= $product['id'] ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a class="btn btn-primary" href="b.php">Create new product</a>
            </div>
        </div>
    </div>



    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>