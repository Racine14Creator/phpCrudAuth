<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "crud");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>