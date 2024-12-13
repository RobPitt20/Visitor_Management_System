<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Management System</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }


        body {
            background-color: antiquewhite; /* Change background color to green */
            background-blend-mode: multiply, multiply;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .navbar-custom {
            background-color: #39204c; /* Custom navbar color */    
        }
        .navbar-nav .nav-item {
            margin-right: 2rem; /* Adjust this value as needed */
        }




        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 91.5vh;
        }



        .center-box {
            width: 50%;
            margin: 10% auto;
            padding: 20px;
            text-align: center;
            border: 2px solid #3b0e5c;
            background-color: #fff;
            border-radius: 5px;
        }
        .btn-ok {
            background-color: #8cb4e0;
            border: none;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-ok:hover {
            background-color: #6a9ed3;
        }
    </style>
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom ">
    <a class="navbar-brand ml-4"  href="#">Visitor Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav" style="margin-right: 5rem;"> <!-- Adjust margin-right to position closer to center -->
            <li class="nav-item active" style="margin-right: 2rem;"> <!-- Adjust the value as needed -->
                <a class="nav-link" href="http://localhost/htdocfinals2/QrScanner.php">Qr Scanner<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" style="margin-right: 2rem;"> <!-- Adjust the value as needed -->
                <a class="nav-link" href="add-guest.php">Add guest</a>
            </li>
            <li class="nav-item" style="margin-right: 2rem;"> <!-- Adjust the value as needed -->
                <a class="nav-link" href="SCHEDULEPAGE/schedulep.php">Schedules</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="#" onclick="confirmLogout()">Logout</a>
                </li>
        </ul>
    </div>
</nav>


    <!-- Welcome Box Section -->
    <div class="center-box">
        <h2>Welcome to Visitor Management System!</h2>
        <p>Start scheduling your memorable events in our system.</p>
        <a href="SCHEDULEPAGE/schedulep.php" class="btn-ok">Ok</a>
    </div>

    <script>
    function confirmLogout() {
        if (confirm("Are you sure you want to logout?")) {
            window.location.href = "logout.php";
        }
    }
    </script>

</body>