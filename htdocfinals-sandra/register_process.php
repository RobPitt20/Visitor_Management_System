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
    <!-- Custom CSS for background -->
    <style>
        body {
            background-color: #f5f5dc; /* Cream background */
            min-height: 100vh; /* Ensure the background covers the entire viewport */
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

        .card-header {
            background-color: #39204C; /* Box color for header */
            color: white; /* White text in the header */
            text-align: center;
            padding: 20px;
        }

        .card-header h3 {
            font-size: 2.5rem;
        }

        /* New box style */
        .info-box {
            border: 2px solid #4CAF50;
            border-radius: 10px;
            padding: 20px;
            background-color: #f9f9f9;
            text-align: center;
            margin-top: 30px;
        }

        .info-box a {
            color: #4CAF50;
            font-weight: bold;
        }

        .info-box h4 {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-user-plus icon"></i> Registration has been Successfully Completed.</h3>
                    </div>
                    <div class="card-body">
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

    <!-- Information Box -->
    <div class="container">
        <div class="info-box">
            <h4>For more information, please email us:</h4>
            <p><a href="mailto:visitor.supports@gmail.com">visitor.supports@gmail.com</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
