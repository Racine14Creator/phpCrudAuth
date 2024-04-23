<?php 

include ("./components/Header.php");

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();

}
?>

    <div class="container mx-auto" style="max-width: 1000px; margin: auto;">
        <div class="row">
            <div class="col-md-12 my-5">
                <div class="card card-body shadow-md">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>