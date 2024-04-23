<?php include ("./components/Header.php")?>

    <div class="container mx-auto">
        <div class="row" style="background: #fff; padding: 20px;">
            <div class="col-md-8 my-5 d-flex flex-column justify-content-center align-items-center">
                <h3>Create your own Account</h3><br>
                <p>
                    Please fill out the form below to create your account.
                </p>
            </div>
            <div class="col-md-4 my-5">
                <div class="card card-body shadow-md">

                    <?php 
                        require_once "./db/connection.php";

                        if (isset($_POST['register'])) {
                            // Collect form data
                            $username = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['username']))));
                            $name = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['name']))));
                            $email = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['email']))));
                            $dob = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['dob']))));
                            $password = mysqli_real_escape_string($conn, trim(htmlentities(htmlspecialchars($_POST['password']))));
                        
                            // Validate form data (you should add more validation)
                            if (empty($username) || empty($name) || empty($email) || empty($dob) || empty($password)) {
                                $error[] = "All fields are required.";
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
                                $stmt = $conn->prepare("INSERT INTO users (username, `name`, email, dob, `password`) VALUES (?, ?, ?, ?, ?)");
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
                        include_once "./components/Error.php";
                    ?>
                    
                    <form action="" method="post" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                    </form>
                </div>
                <div class="card card-body pb-2 shadow-xl my-3">
                    <p>Already have an account? <a href="login.php" class="btn-link">Log in here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
