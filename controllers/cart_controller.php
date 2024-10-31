<?php
//connect to the cart class
require_once("../classes/cart_class.php");

//-- Add to Cart --//
function addToCartController($p_id, $ip_add, $c_id, $qty) {
    $cart = new cart_class();
    return $cart->add_to_cart($p_id, $ip_add, $c_id, $qty);
}

//-- Update Cart Quantity --//
function updateCartQuantityController($p_id, $c_id, $qty) {
    $cart = new cart_class();
    return $cart->update_cart_quantity($p_id, $c_id, $qty);
}

//-- Delete Item from Cart --//
function deleteCartItemController($p_id, $c_id) {
    $cart = new cart_class();
    return $cart->delete_cart_item($p_id, $c_id);
}

//-- View Cart --//
function viewCartController($c_id) {
    $cart = new cart_class();
    return $cart->view_cart($c_id);
}


?>
