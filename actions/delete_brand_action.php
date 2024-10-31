<?php
include("../controllers/brand_controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand_id = $_POST['brand_id'];
    $result = deleteBrandController($brand_id);

    if ($result) {
        header("Location: ../view/brand.php");
    } else {
        echo "Failed to delete brand.";
    }
}
?>