<?php
//connect to controller
require_once("../controllers/cart_controller.php");

//get data from the form or URL
session_start();


// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login_register.php");
    exit();
}


If ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_id = $_POST['product_id'];
    $ip_add = "";  //get user IP address   
    $c_id = $_SESSION["user_id"]; 
    $qty = 1;

    //Retrieve other form data if needed

    //call the controller function
    $addToCart = addToCartController($p_id, $ip_add, $c_id, $qty);

    if ($addProductResult !== false) {
        header("Location: ../view/product_listing.php");
    } else {
        echo "Failed to submit.";
    }
}
?>
