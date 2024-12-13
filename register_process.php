<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS for background animation -->
    <style>
        body {
            background: linear-gradient(45deg, #4CAF50, #FFEB3B, #FFD700);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh; /* Ensure the background covers the entire viewport */
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .card {
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .footer-text {
            font-size: 25px;
            margin-top: 80px;
        }

        .icon {
            font-size: 3rem;
        }

        /* Larger container and text */
        .container {
            max-width: 800px;
            margin-top: 50px;
        }

        .card-header h3 {
            font-size: 2.5rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3><i class="fas fa-user-plus icon"></i> Registration has been Successfully Completed.</h3>
                    </div>
                    <div class="card-body">
                        <!-- PHP code for registration goes here -->
                        <?php
                        // PHP registration code goes here
                        ?>
                        <!-- Success message after registration -->
                        <div class="alert alert-success text-center" role="alert">
                            YOU ARE SUCCESSFULLY REGISTERED! <strong>DON'T SHARE YOUR PASSWORD TO ANYONE</strong>
                        </div>
                        <p class="text-center">Back to <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Footer message -->
    <div class="container text-center footer-text">
        <p>For more information, please contact us at the 2nd floor (ITS) and look for Sir Peter Padilla.</p>
    </div>
</body>

</html>
