<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #00FF00, #FFFF00, #FFD700);
      margin: 0;
      padding: 0;
      overflow: hidden;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      animation: fadeIn 1s ease;
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
    h1 {
      color: #009900; /* Green */
      text-align: center;
    }
    .form-group {
      margin-bottom: 30px;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 10px;
    }
    select {
      width: 100%;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      font-size: 16px;
    }
    .smiley-rating {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .smiley-rating label {
      margin-right: 10px;
    }
    .smiley-rating img {
      width: 70px;
      height: auto;
      cursor: pointer;
    }
    input[type="submit"] {
      background-color: #FFD700; /* Gold */
      color: #fff;
      padding: 15px 30px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 18px;
    }
    input[type="submit"]:hover {
      background-color: #FFD700; /* Yellow */
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Feedback</h1>
    <form action="#" method="post">
      <div class="form-group">
        <label for="helpful">How helpful is the website?</label>
        <select id="helpful" name="helpful">
          <option value="1">1 - Not helpful at all</option>
          <option value="2">2 - Somewhat helpful</option>
          <option value="3">3 - Helpful</option>
          <option value="4">4 - Very helpful</option>
        </select>
      </div>
      <div class="form-group">
        <label for="functioning">How well is the website functioning?</label>
        <select id="functioning" name="functioning">
          <option value="1">1 - Not functioning well</option>
          <option value="2">2 - Somewhat functioning</option>
          <option value="3">3 - Functioning</option>
          <option value="4">4 - Very well functioning</option>
        </select>
      </div>
      <div class="form-group">
        <label for="qr_scan">How does QR scan help you?</label>
        <select id="qr_scan" name="qr_scan">
          <option value="1">1 - Not helpful</option>
          <option value="2">2 - Somewhat helpful</option>
          <option value="3">3 - Helpful</option>
          <option value="4">4 - Very helpful</option>
        </select>
      </div>
      <div class="form-group">
        <label for="comment">Additional Comments</label>
        <textarea id="comment" name="comment" rows="6" placeholder="Feel free to provide any additional feedback."></textarea>
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
