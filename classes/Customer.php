<?php
// classes/Customer.php
include_once 'Database.php';

class Customer
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkEmailExists($email)
    {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM customer WHERE customer_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function addCustomer($name, $email, $password, $country, $city, $contact)
    {
        $conn = $this->db->getConnection();
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO customer (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, user_role) VALUES (?, ?, ?, ?, ?, ?, 2)");
        $stmt->bind_param("ssssss", $name, $email, $hashedPassword, $country, $city, $contact);
        return $stmt->execute();
    }

    public function login($email, $password)
    {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM customer WHERE customer_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['customer_pass'])) {
                return $user;
            } else {
                return false; // Password does not match
            }
        } else {
            return false; // Email not found
        }
    }
}
