<?php
//connect to database class
require_once("../settings/db_class.php");
require_once("../classes/product_class.php"); 

/**
 *General class to handle all functions 
 */
/**
 *@author David Sampah
 *
 */

//  public function add_brand($a,$b)
// 	{
// 		$ndb = new db_connection();	
// 		$name =  mysqli_real_escape_string($ndb->db_conn(), $a);
// 		$desc =  mysqli_real_escape_string($ndb->db_conn(), $b);
// 		$sql="INSERT INTO `brands`(`brand_name`, `brand_description`) VALUES ('$name','$desc')";
// 		return $this->db_query($sql);
// 	}
class category_class extends db_connection
{
	//--INSERT--//
	public function add_category($category_name)
	{
		$ndb = new db_connection();
		$category_name = mysqli_real_escape_string($ndb->db_conn(), $category_name);
		$sql = "INSERT INTO `categories`(`cat_name`) VALUES ('$category_name')";
		return $this->db_query($sql);
	}

	//--SELECT--//
	public function viewAll_category()
	 {
        $sql = "SELECT * FROM categories";
        return $this->db_fetch_all($sql);
    }

	//--DELETE--//
	// Delete a brand by id
	public function deleteCategory($id)
{
    $id = (int) $id;

    // First, delete all products associated with this category
    $productClass = new product_class();
    $productClass->deleteProductsByCategory($id);

    // Now delete the category
    $sql = "DELETE FROM categories WHERE cat_id = '$id'";
    return $this->db_query($sql);
}


}

?>