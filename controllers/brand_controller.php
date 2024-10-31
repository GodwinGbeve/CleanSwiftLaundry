<?php
//connect to the user account class
include_once("../classes/brand_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//
function add_brand_ctr($brandName)
{
    $addbrand = new general_class();
    return $addbrand->add_brand($brandName);
}

//--SELECT--//
// Fetch all brands
function get_all_brands_ctr()
{
    $brand = new general_class();
    return $brand->get_all_brands();
}


//--UPDATE--//

//--DELETE--//
function deleteBrandController($id)
{
    $brand = new general_class();
    return $brand->deleteBrand($id);
}



?>