<?php
// classes/Database.php

class Database {
    protected $conn;

    // Constructor: Establish database connection
    public function __construct() {
        // Connect to the database
        $this->conn = new mysqli('localhost', 'root', '', 'dbforlab');
        
        // Check for connection error
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Public method to get the database connection
    public function getConnection() {
        return $this->conn;
    }

    // Close the database connection
    public function closeConnection() {
        $this->conn->close();
    }
}
?>
