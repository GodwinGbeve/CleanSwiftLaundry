<?php
//connect to database class
require_once("../settings/db_class.php");

/**
 *General class to handle all functions 
 */
/**
 *@author David Sampah
 *
 */
class product_class extends db_connection
{
    //--INSERT--//
    public function add_product($category, $brand, $title, $price, $description, $keywords)
    {
        $ndb = new db_connection();
        $category = mysqli_real_escape_string($ndb->db_conn(), $category);
        $brand = mysqli_real_escape_string($ndb->db_conn(), $brand);
        $title = mysqli_real_escape_string($ndb->db_conn(), $title);
        $price = mysqli_real_escape_string($ndb->db_conn(), $price);
        $description = mysqli_real_escape_string($ndb->db_conn(), $description);
        $keywords = mysqli_real_escape_string($ndb->db_conn(), $keywords);


        $sql = "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_keywords`) VALUES ('$category','$brand','$title','$price','$description','$keywords')";
        return $this->db_query($sql);
    }

    //--SELECT--//
    public function viewAllProducts()
    {
        $ndb = new db_connection();
        $sql = "SELECT * FROM products";
        return $this->db_fetch_all($sql);
    }
    //--DELETE--//
    public function deleteProduct($product_id)
    {
        $sql = "DELETE FROM products WHERE product_id = '$product_id'";
        return $this->db_query($sql);
    }
    public function deleteProductsByBrand($brand_id)
    {
        $sql = "DELETE FROM products WHERE product_brand = '$brand_id'";
        return $this->db_query($sql);
    }
    public function deleteProductsByCategory($category_id)
{
    $sql = "DELETE FROM products WHERE product_cat = '$category_id'";
    return $this->db_query($sql);
}


}

?>