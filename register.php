<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<?php include ("./components/Header.php")?>

<div class="container mx-auto" style="min-width: 1000px; margin: auto">
    <?php include("./components/Registration.php")?>
</div>