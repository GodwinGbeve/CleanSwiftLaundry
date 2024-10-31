<?php

include("../controllers/product_controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $keywords = $_POST['keywords'];

    $addProduct = addproduct_ctr($category, $brand, $title, $price, $description, $keywords);
    if ($addProduct !== false) {
        header("Location: ../view/service.php");
    } else {
        echo "Failed to add product";
    }
}

?>