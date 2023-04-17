<?php
include_once("../systemConfig.php");

class ProductResources
{
    private $dbReference;
    public $dbConnect;

    public function __construct()
    {
        $this->dbReference = new systemConfig();
        $this->dbConnect = $this->dbReference->connectDB();
    }

    public function getAll()
    {
        $query = "SELECT * FROM products";
        $result = $this->dbConnect->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $this->dbReference->sendResponse(200, $data);
    }
    public function getById($id)
    {
        $query = "SELECT * FROM products WHERE id = $id";
        $result = $this->dbConnect->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $this->dbReference->sendResponse(200, $data);
    }
    public function create($name, $description, $price, $image)
    {
        $query = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
        $result = $this->dbConnect->query($query);
        if ($result) {
            $this->dbReference->sendResponse(200, "Create product successfully");
        } else {
            $this->dbReference->sendResponse(500, "Create product failed");
        }
    }
    public function update($id, $name, $description, $price, $image)
    {
        $query = "UPDATE products SET name = '$name', description = '$description', price = '$price', image = '$image' WHERE id = $id";
        $result = $this->dbConnect->query($query);
        if ($result) {
            $this->dbReference->sendResponse(200, "Update product successfully");
        } else {
            $this->dbReference->sendResponse(500, "Update product failed");
        }
    }
    public function delete($id)
    {
        $query = "DELETE FROM products WHERE id = $id";
        $result = $this->dbConnect->query($query);
        if ($result) {
            $this->dbReference->sendResponse(200, "Delete product successfully");
        } else {
            $this->dbReference->sendResponse(500, "Delete product failed");
        }
    }
}
