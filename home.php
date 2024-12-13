<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: 'Josefin Sans', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #009900, #ffff00, gold);
            background-size: 600% 600%;
            animation: gradientBG 10s ease infinite;
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

        .wrapper {
            display: flex;
            width: 100vw;
            height: 100vh;
        }

        .sidebar {
            width: 200px;
            height: 100%;
            background: rgba(0, 0, 0, 0.8); /* Semi-transparent background for sidebar */
            padding: 30px 0;
        }

        .sidebar h2 {
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar ul li a {
            color: #fff;
        }

        .main_content {
            flex: 1;
            padding: 50px;
        }

        .header {
            color: #fff;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .info {
            color: #fff;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Book Store</h2>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="#"><i class="fas fa-users"></i>Accounts</a></li>
                <li><a href="#"><i class="fab fa-product-hunt"></i>Products</a></li>
                <li><a href="#"><i class="fas fa-home"></i>Inventory</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">Welcome SNDR</div>
            <div class="info">
                <div>Bachelor of Science in Information Technology</div>
                 <div> PERLAS, GHESANDRA TABING</div>
            </div>
        </div>
    </div>
</body>
</html>
