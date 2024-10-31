<?php
include("../controllers/category_controller.php");

$categories = viewAllCategories_ctr();
echo json_encode($categories);
?>
