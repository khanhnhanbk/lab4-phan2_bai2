<?php
// Compare this snippet from api\product\update.php:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = htmlentities($_POST['id']);
    $name = htmlentities($_POST['name']);
    $description = htmlentities($_POST['description']);
    $price = htmlentities($_POST['price']);
    $image = htmlentities($_POST['image']);
    
    include_once("../product/ProductResourcesDAO.php");
    $product = new ProductResources();
    $product->update($id, $name, $description, $price, $image);

} else {
    echo "Method not allowed";
}