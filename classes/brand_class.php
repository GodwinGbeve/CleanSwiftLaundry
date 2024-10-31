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
class general_class extends db_connection
{
	//--INSERT--//
	public function add_brand($brandName)
	{
		$ndb = new db_connection();
		$brandName = mysqli_real_escape_string($ndb->db_conn(), $brandName);
		$sql = "INSERT INTO `brands`(`brand_name`) VALUES ('$brandName')";
		return $this->db_query($sql);
	}

	//--SELECT--//
	public function get_all_brands()
	{
		$sql = "SELECT * FROM brands";
		return $this->db_fetch_all($sql);
	}


	//--UPDATE--//



	//--DELETE--//
	// Delete a brand by id
	public function deleteBrand($id)
{
    $id = (int) $id;

    // First, delete all products associated with this brand
    $productClass = new product_class();
    $productClass->deleteProductsByBrand($id);

    // Now delete the brand
    $sql = "DELETE FROM brands WHERE brand_id = '$id'";
    return $this->db_query($sql);
}


}

?>