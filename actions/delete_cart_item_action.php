<?php
//connect to controller
require_once("../controllers/cart_controller.php");

//get data from the form or URL
$p_id = $_POST['product_id'];
$c_id = $_POST['customer_id'];

//call the controller function
$deleteCartItem = deleteCartItemController($p_id, $c_id);

if ($deleteCartItem) {
    echo "Item removed from cart successfully!";
} else {
    echo "Failed to remove item from cart.";
}
?>
