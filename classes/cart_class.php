<?php
//connect to database class
require_once("../settings/db_class.php");

/**
 * Cart class to handle cart operations
 */
class cart_class extends db_connection {

    //-- Add to Cart --//
    public function add_to_cart($p_id, $ip_add, $c_id, $qty) {
        $p_id =mysqli_real_escape_string($this->db_conn(), $p_id);
        $c_id = mysqli_real_escape_string($this->db_conn(),  $c_id);
        $qty = mysqli_real_escape_string($this->db_conn(),  $qty);
        $ip_add = mysqli_real_escape_string($this->db_conn(), $ip_add);
        
        $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND ip_add = '$ip_add' AND c_id = '$c_id'";
        $result = $this -> db_fetch_all($sql);

        if ($result){
            $newQuantity = $result['qty'] + $qty;
            $sqlUpdate= "UPDATE cart SET qty = '$newQuantity' 
                        WHERE p_id = '$p_id' AND ip_add = '$ip_add' AND c_id = '$c_id'";
            return $this -> db_query($sqlUpdate);


        }else{
            $sqlInsert = "INSERT INTO cart (p_id, ip_add, c_id, qty) 
                        VALUES ('$p_id', '$ip_add', '$c_id', '$qty')";
            return $this -> db_query($sqlInsert);
        }
    }

    public function  update_cart_quantity($p_id, $c_id, $qty){
        $p_id =mysqli_real_escape_string($this->db_conn(), $p_id);
        $c_id = mysqli_real_escape_string($this->db_conn(),  $c_id);
        $qty = mysqli_real_escape_string($this->db_conn(),  $qty);

        $sql = "UPDATE cart SET qty = '$qty' WHERE p_id = '$p_id' AND c_id = '$c_id'";
        return $this -> db_query($sql);
    }
    public function  delete_cart_item($p_id, $c_id){
        $p_id =mysqli_real_escape_string($this->db_conn(), $p_id);
        $c_id = mysqli_real_escape_string($this->db_conn(),  $c_id);

        $sql = "DELETE FROM cart WHERE p_id = '$p_id' AND c_id = '$c_id'";
        return $this -> db_query($sql);
    }

    public function view_cart($c_id) {
        $c_id = mysqli_real_escape_string($this->db_conn(), $c_id);
    
        // Join cart with products to fetch product details
        $sql = "
            SELECT cart.p_id, cart.qty, products.product_title, products.product_price, products.product_image 
            FROM cart 
            JOIN products ON cart.p_id = products.product_id 
            WHERE cart.c_id = '$c_id'";
        
        return $this->db_fetch_all($sql);
    }
    

}

     
?>
