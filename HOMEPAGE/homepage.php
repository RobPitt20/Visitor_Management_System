<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FFFCF1;
        }
        .header {
            background-color: #3b0e5c;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header h1 {
            margin: 0px;
            font-size: 3rem;
        }
        .header-content {
    display: flex;
    align-items: center;}
        .header nav a {
            color: white;
            margin-left: 150px;
            text-decoration: none;
        }
        .header nav a:hover {
            text-decoration: underline;
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

    <!-- Header Section -->
    <div class="header">
        <h1>VISITOR MANAGEMENT SYSTEM</h1>
        <nav>
            <a href="C:/xampp/htdocs/htdocfinals2/QrScanner">QR Scanner</a>
            <a href="schedules.html">Schedules</a>
            <a href="add_guest.html">Add guest</a>
            <a href="logout.html">Logout</a>
        </nav>
    </div>

    <!-- Welcome Box Section -->
    <div class="center-box">
        <h2>Welcome to Visitor Management System!</h2>
        <p>Start scheduling your memorable events in our system.</p>
        <a href="schedules.html" class="btn-ok">Ok</a>
    </div>