<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS for background animation -->
    <style>
        body {
            background-color: darkslategray; /* Background color */
            color: #009900; /* Text color */
            font-family: Arial, sans-serif; /* Font family */
        }

        .container-login {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.2); /* Shadow only */
            background: white; /* White background */
        }

        .icon {
            font-size: 3rem;
            /* Adjust the size of the icon as needed */
        }

        .card-header h3 {
            color: #009900; /* Text color */
        }

        .card-header h3 .icon {
            color: #009900; /* Icon color */
        }

        .title {
            font-size: 36px; /* Increased font size */
            font-weight: bold;
            text-align: center;
            color: white; /* Title text color */
            margin-top: 40px; /* Adjusted margin top */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="container-login">
                    <div class="card-header text-center">
                        <h3><i class="fas fa-user icon"></i> Admin</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>

                            <?php
                            session_start();

                            // Database connection
                            $db = mysqli_connect("localhost", "root", "", "qr_attendance_db");

                            if (!$db) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $error = ""; // Initialize error variable

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $email = mysqli_real_escape_string($db, $_POST["email"]);
                                $password = mysqli_real_escape_string($db, $_POST["password"]);

                                // Prepare a SQL query to retrieve user details
                                $query = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
                                $result = mysqli_query($db, $query);

                                if (mysqli_num_rows($result) == 1) {
                                    // Set up session variables
                                    $_SESSION["email"] = $email;
                                    header("Location: subjectadmin.php"); // Redirect to subjectadmin.php after successful login
                                    exit();
                                } else {
                                    // Invalid credentials
                                    $error = "Invalid email or password";
                                }
                            }
                            ?>
                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #009900; border-color: #009900;">Login</button>
                        </form>
                    </div>
                </div>
                <div class="title">QR Code Attendance System</div>
            </div>
        </div>
    </div>
</body>
</html>
