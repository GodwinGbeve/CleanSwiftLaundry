<?php
include("../controllers/category_controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryName = $_POST['name'];
    $addCategory = addcategory_ctr($categoryName);

    if ($addCategory !== false) {
        header("Location: ../view/category.php");
    } else {
        echo "Failed to add category";
    }
}
?>
