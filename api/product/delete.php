<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = htmlentities($_POST['id']);    
    include_once("../product/ProductResourcesDAO.php");
    $product = new ProductResources();
    $product->delete($id);

} else {
    echo "Method not allowed";
}