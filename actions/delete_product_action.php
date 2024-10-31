<?php
include("../controllers/product_controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $result = deleteProductController($product_id);

    if ($result) {
        header("Location: ../view/service.php");
    } else {
        echo "Failed to delete product.";
    }
}
