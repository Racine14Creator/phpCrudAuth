<?php
require_once "./db/connection.php";

session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = array();

$username = '';
$password = '';

if(isset($_POST['login'])){
    
    $username = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['username']))));
    $password = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['password']))));

    
    if(empty($username)){array_push($error, "Username or Email is required");}
    if(empty($password)){array_push($error, "The password is required");}

    if(count($error) == 0){

        // Removed password hashing here, as we compare with the hashed password stored in the database
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];
            
            // Verify the password against the hashed password stored in the database
            if(password_verify($password, $hashed_password)){
                // Update user status to 'Online'
                $user_id = $row['user_id'];
                $connected = mysqli_query($conn, "UPDATE users SET `status_active` = 'Online' WHERE user_id = $user_id");
                if($connected) {
                    $_SESSION['user_id'] = $row['user_id']; // Set the user ID or any relevant data
                    header("Location: index.php");
                    exit();
                }
            }else {
                array_push($error, "Wrong username/password combination. please try again!!!");
            }
        }else {
            array_push($error, "User not found. Please check your username/email.");
        }
    }
}

?>
