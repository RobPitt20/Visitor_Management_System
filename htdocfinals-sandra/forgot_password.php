<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
        body {
            background-color: #f5f5dc; /* Cream background */
            font-family: Arial, sans-serif; /* Set font to Arial */
        }
 
        .header {
            background-color: #39204C; /* Purple header */
            color: white;
            padding: 20px 0; /* Padding for header */
            text-align: center;
            margin-bottom: 20px; /* Space below the header */
        }
 
        .container {
            margin-top: 20px;
        }
 
        .card {
            border-radius: 20px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
            max-width: 600px; /* Set a larger max-width for the card */
            margin: auto; /* Center the card */
            padding: 30px; /* Padding for the card */
        }
 
        .card-header {
            background-color: #76A3C8; /* Top half color */
            color: white;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            padding: 20px; /* Padding for the header */
            text-align: center;
        }
 
        .card-body {
            background-color: white; /* Bottom half color */
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            padding: 40px; /* Increased padding for body */
            text-align: center;
        }
 
        .card-body h4 {
            font-size: 1.8rem; /* Title font size */
            margin-bottom: 20px; /* Space below the title */
        }
 
        .card-body p {
            font-size: 1.2rem; /* Increased paragraph font size */
            margin-bottom: 30px; /* Space below the paragraph */
        }
 
        .form-group label {
            font-size: 1.2rem; /* Increased label font size */
        }
 
        .btn-send {
            background-color: #39204C; /* Button color */
            color: white; /* Button text color */
            font-size: 1.2rem; /* Increased button font size */
            padding: 15px; /* Increased padding for button */
        }
</style>
</head>
 
<body>
<div class="header">
<h1>VISITOR MANAGEMENT SYSTEM</h1>
</div>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12"> <!-- Full width column for larger box -->
<div class="card">
<div class="card-header">
<h4>Forgot Password</h4>
</div>
<div class="card-body">
<p>Please enter your registered email address. You will receive an email to confirm your account.</p>
<form method="POST" action="send_reset_email.php"> <!-- Update the action as needed -->
<div class="form-group">
<label for="email">Email Address</label>
<input type="email" class="form-control" id="email" name="email" required>
</div>
<button type="submit" class="btn btn-send btn-block">Send</button> <!-- Send button -->
</form>
</div>
</div>
</div>
</div>
</div>
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
 
</html>