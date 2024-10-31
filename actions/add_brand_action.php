<?php

include("../controllers/brand_controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['name'];
    $addBrand = add_brand_ctr($brandName);
    if ($addBrand !== false) {
        header("Location: ../view/brand.php");
    } else {
        echo "Failed to add brand";
    }
}

?>