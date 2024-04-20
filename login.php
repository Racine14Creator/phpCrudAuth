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
    <div class="container mx-auto" style="max-width: 1000px; margin: auto;">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Budget</h2>
            <a href="register.html" class="btn btn-md btn-success">Add</a>
        </div>
        <div class="row">
            <div class="col-md-4 my-5">
                <div class="card card-body shadow-md">
                    <form action="/action_page.php" class="needs-validation" novalidate>
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>