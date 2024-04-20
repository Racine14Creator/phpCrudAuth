<?php
session_start();

// Initialize errors array
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    include_once "./db/connection.php";
    $username = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['username']))));
    $name = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['name']))));
    $email = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['email']))));
    $dob = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['dob']))));
    $password = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['password']))));

    // Validate form data (you should add more validation)
    if (empty($username) || empty($name) || empty($email) || empty($dob) || empty($password)) {
        $errors[] = "All fields are required.";
    }
    
    if(empty($username)){array_push($error, "Username is required");}

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $errors[] = "Username or email already exists.";
    }

    // If no errors, insert user data into the database
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into users table
        $stmt = $conn->prepare("INSERT INTO users (username, name, email, dob, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $name, $email, $dob, $hashed_password);
        $stmt->execute();
        $stmt->close();

        // Redirect to login page
        header("Location: login.php");
        exit();
    }
    
// Close database connection
$conn->close();
}

?>
