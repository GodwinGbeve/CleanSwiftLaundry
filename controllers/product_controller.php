<?php
//connect to the product class
include_once("../classes/product_class.php");

//--INSERT--//
function addproduct_ctr($category, $brand, $title, $price, $description, $keywords)
{
    $addproduct = new product_class();
    return $addproduct->add_product($category, $brand, $title, $price, $description, $keywords);
}

//--SELECT--//
// Fetch all products
function view_product_ctr()
{
    $product = new product_class();
    return $product->viewAllProducts();
}

//--DELETE--//
function deleteProductController($product_id) {
    $product = new product_class();
    return $product->deleteProduct($product_id);
}

function deleteProductsByBrandController($brand_id) {
    $product = new product_class();
    return $product->deleteProductsByBrand($brand_id);
}
?>
