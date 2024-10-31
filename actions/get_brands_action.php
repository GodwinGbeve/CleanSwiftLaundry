<?php
include("../controllers/brand_controller.php");

$brands = get_all_brands_ctr();
echo json_encode($brands);
?>