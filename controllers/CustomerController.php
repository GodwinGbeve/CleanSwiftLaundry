<?php
// Controllers/CustomerController.php
include_once '../classes/Customer.php';

class CustomerController {
    private $customer;

    public function __construct() {
        $this->customer = new Customer();
    }

    public function register($name, $email, $password, $country, $city, $contact) {
        if ($this->customer->checkEmailExists($email)) {
            return "Email already exists.";
        } else {
            return $this->customer->addCustomer($name, $email, $password, $country, $city, $contact) ? "Registration successful!" : "Registration failed.";
        }
    }

    public function login($email, $password) {
        $user = $this->customer->login($email, $password);
        if ($user) {
            // Start a session and store user information
            session_start();
            $_SESSION['user_id'] = $user['customer_id'];
            $_SESSION['user_name'] = $user['customer_name'];
            $_SESSION['user_email'] = $user['customer_email'];
            $_SESSION['user_role'] = $user['user_role'];
            return "Login successful!";
        } else {
            return "Invalid email or password.";
        }
    }
}
