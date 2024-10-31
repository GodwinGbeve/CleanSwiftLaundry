<?php
include("../controllers/category_controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = $_POST['cat_id'];
    $result = deleteCategoriesController($category_id);

    if ($result) {
        header("Location: ../view/category.php");
    } else {
        echo "Failed to delete category.";
    }
}
?>
