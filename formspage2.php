<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: antiquewhite;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }
        h1 {
            font-size: 40px;
            color: #39204c;
        }
        p {
            font-size: 18px;
            margin-top: 20px;
            color: #333;
        }
        .btn {
            padding: 12px 24px;
            font-size: 16px;
            width: 100%;
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #39204c;
            border-color: #39204c;
        }
        .btn-secnodary {
            background-color: #6c757d;
            border-color: #6c757d;
    </style>
</head>
<body>

    <div class="container">
        <h1><strong>Thank You</strong></h1>
        <p>We respect your decision. You have chosen not to agree to the privacy notice and consent. If you change your mind, feel free to revisit the page.</p>
        <p>If you would like to return to the homepage or exit the site, you can do so by clicking the buttons below:</p>
        
        <button class="btn btn-primary" onclick="window.location.href='formspage.php';">Return to Forms</button>
        <button class="btn btn-secondary" onclick="window.location.href='https://www.google.com';">Exit Site</button>
    </div>

</body>
</html>