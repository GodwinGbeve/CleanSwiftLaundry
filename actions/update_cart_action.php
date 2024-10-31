<?php
//connect to controller
require_once("../controllers/cart_controller.php");

//get data from the form or URL
$p_id = $_POST['product_id'];
$c_id = $_POST['customer_id'];
$qty = $_POST['quantity'];

//call the controller function
$updateCart = updateCartQuantityController($p_id, $c_id, $qty);

if ($updateCart) {
    echo "Cart updated successfully!";
} else {
    echo "Failed to update cart.";
}
?>
