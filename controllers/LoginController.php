<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = array();


if(isset($_POST['login'])){
    
    $username = mysqli_real_escape_string($con, trim(htmlentities(htmlspecialchars($_POST['username']))));
    $password = mysqli_real_escape_string($con, trim(htmlentities(htmlspecialchars($_POST['password']))));

    
    if(empty($username)){array_push($error, "Username is required");}
    if(empty($password)){array_push($error, "The password is required");}

    if(count($error) == 0){

        $password = md5($password);

        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result)){
            // To add if the ser connected into the database as is connected
            $connected = mysqli_query($con, "UPDATE admin SET `status` = 'Online' WHERE email = ${$email}");
            if($connected) {
                $_SESSION['user_id'] = $user_id; // Set the user ID or any relevant data
                header("Location: index.php");
                exit();
            }
        }else {
            array_push($error, "Wrong username/password combination. please try again!!!");
        }
    }
}

?>
