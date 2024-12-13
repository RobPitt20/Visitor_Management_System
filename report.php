<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report a Problem</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, green, yellow, gold); /* Background gradient */
      color: white; /* Text color */
      animation: color-change 5s infinite; /* Animation */
    }
    @keyframes color-change {
      0% { color: white; }
      50% { color: black; }
      100% { color: white; }
    }
    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center; /* Center align text */
    }
    h1 {
      font-family: Impact, Charcoal, sans-serif; /* Different font for "CONTAINER" */
      font-size: 36px; /* Larger font size for emphasis */
      margin-bottom: 20px; /* Add some space below the heading */
    }
    p {
      font-size: 18px; /* Larger font size for better readability */
      margin-bottom: 20px; /* Add some space below the paragraph */
    }
    .form-group {
      margin-bottom: 20px;
      text-align: left; /* Align form elements to the left */
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    input[type="text"],
    input[type="email"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #FFD700; /* Gold */
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%; /* Make the button full width */
      display: block; /* Display the button as block-level element */
    }
    input[type="submit"]:hover {
      background-color: #FFFF00; /* Yellow */
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>HELLO ADMIN</h1>
    <p>Report a Problem</p>
    <form action="#" method="post">
      <div class="form-group">
        <label for="url">You are reporting an issue at:</label>
        <input type="text" id="url" name="url" value="http://localhost/htdocfinals/masterlist.php" readonly>
      </div>
      <div class="form-group">
        <label for="issue">Issue(s) with the page *</label>
        <select id="issue" name="issue">
          <option value="outdated">Outdated or incorrect information</option>
          <option value="broken">Broken link(s)</option>
          <option value="email">Email</option>
          <option value="misspelling">Misspelling</option>
          <option value="images">Missing/broken qr scanner</option>
        </select>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Email">
      </div>
      <div class="form-group">
        <label for="confirm_email">Confirm Email</label>
        <input type="email" id="confirm_email" name="confirm_email" placeholder="Confirm Email">
      </div>
      <div class="form-group">
        <label for="comment">Comment</label>
        <textarea id="comment" name="comment" rows="4" placeholder="Feel free to provide any additional feedback."></textarea>
      </div>
      <input type="submit" value="SUBMIT">
    </form>
  </div>
</body>
</html>
