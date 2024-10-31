<?php
// Start the session
session_start();

// Destroy all session variables and the session itself
session_unset();
session_destroy();

// Redirect to login page or homepage after logout
header("Location: ../Login/login_register.php");
exit();


