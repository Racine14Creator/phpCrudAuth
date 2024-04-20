<?php require_once "./controllers/LoginController.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <div class="container mx-auto">
        
        <div class="row" style="background: #fff; padding: 20px;">
            <div class="col-md-4 my-5">
                <div class="card card-body shadow-md">
                    <form action="./controllers/LoginController.php" class="needs-validation" novalidate>
                        <div class="form-group">
                          <label for="uname">Username:</label>
                          <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Submit</button>
                      </form>
                </div>
                <div class="card card-body pb-2 shadow-xl my-3">
                    <p>I don't have an <a href="registration.php" class="btn-link">account</a></p>
                </div>
            </div>
            <div class="col-md-8 my-5">
                <h3>Login with your Account</h3>
            </div>
        </div>
    </div>
</body>
</html>