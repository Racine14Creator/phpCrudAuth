<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate login credentials (you should implement this)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials against your database
    if (/* credentials are valid */) {
        // Set session variables to indicate user is logged in
        $_SESSION['user_id'] = $user_id; // Set the user ID or any relevant data
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!-- Your login form HTML -->
