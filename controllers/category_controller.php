<?php
//connect to the user account class
include_once("../classes/category_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//
function addcategory_ctr($category_name)
{
    $newcat = new category_class();
    return $newcat->add_category($category_name);
}

//--SELECT--//
// Fetch all brands
function viewAllCategories_ctr()
{
    $category = new category_class();
    return $category->viewAll_category();
}


//--UPDATE--//

//--DELETE--//
function deleteCategoriesController($id)
{
    $category = new category_class();
    return $category->deleteCategory($id);
}



?>