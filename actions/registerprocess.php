<?php
include_once '../controllers/CustomerController.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];

    $controller = new CustomerController();
    $result = $controller->register($name, $email, $password, $country, $city, $contact);

    if ($result === "Registration successful!") {
        echo json_encode(["status" => "success", "message" => $result]);
    } else {
        echo json_encode(["status" => "error", "message" => $result]);
    }
}
