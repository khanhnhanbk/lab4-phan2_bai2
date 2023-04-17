<?php
include_once("../product/ProductResourcesDAO.php");

$id = $_GET['id'];
$product = new ProductResources();
$product->getById($id);
