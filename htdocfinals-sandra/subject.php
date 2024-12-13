<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <!-- Add Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-MmfDkLj4RRyy3evoP6IypEg4QvLCtWB6wIzZw8JqKjrS1u7n+DThyHy9bsYPpzSZ" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #009900, #ffff00, gold);
            background-size: 600% 600%;
            animation: gradientBG 10s ease infinite;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .subject {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            cursor: pointer; /* Add pointer cursor for subjects */
            transition: transform 0.3s ease; /* Add smooth transition effect */
        }

        .subject:hover {
            transform: scale(1.05); /* Enlarge subject on hover */
        }

        .subject h2 {
            margin-bottom: 10px;
            color: #555;
            display: flex;
            align-items: center;
        }

        .subject h2 img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .professor {
            color: #777;
            margin-bottom: 5px;
        }

        .time {
            margin-bottom: 5px;
        }

        .students {
            margin-top: 20px;
        }

        .student {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .student img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .student-info {
            display: flex;
            flex-direction: column;
        }

        .student-info span.name {
            font-weight: bold;
            font-size: 18px;
        }

        .student-info span.number {
            color: #666;
            font-size: 14px;
        }

        .nav {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            background-color: #009900;
            padding: 20px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 50px;
        }

        .nav button {
            margin-bottom: 10px;
            padding: 10px 20px;
            background-color: #005500;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: none; /* Initially hide the button */
        }

        .nav:hover button {
            display: block; /* Show the button on hover */
        }

        .nav button:hover {
            background-color: #003300;
        }
    </style>
</head>
<body>
    <div class="nav">
        <button>Featured</button>
    </div>
</body>
</html>

</head>
<body>
    <!-- Navigation Bar -->
    <div class="nav">
        <button onclick="navigateTo('home.php')">Home</button>
        <button onclick="navigateTo('calendar.php')">Calendar</button>
        <button onclick="navigateTo('report.php')">Report a Problem</button>
        <button onclick="navigateTo('feedback.php')">Feedback</button>
        <button onclick="navigateTo('logout.php')">Logout</button>
    </div>

    <div class="container" style="margin-Center: 200px;"> <!-- Adjust margin-left for content -->
        <h1>Subjects</h1>
        <div class="subject" onclick="showStudents('Information Management')">
            <h2><img src="logo.jpg" alt="Information Management Logo"> Information Management</h2>
            <p class="professor">Prof. Lorielle Rocela- Faculty•HED</p>
            <p class="time">Time: Monday and Wednesday, 9:00 AM - 10:30 AM</p>
        </div>
        <div class="subject" onclick="showStudents('Object Oriented Programming')">
            <h2><img src="logo.jpg" alt="Object Oriented Programming Logo"> Object Oriented Programming</h2>
            <p class="professor">Prof. Lorielle Rocela- Faculty•HED</p>
            <p class="time">Time: Tuesday and Thursday, 1:00 PM - 2:30 PM</p>
        </div>
        <div class="subject" onclick="showStudents('Introduction to Web Programming')">
            <h2><img src="logo.jpg" alt="Introduction to Web Programming Logo"> Introduction to Web Programming</h2>
            <p class="professor">Prof. Lorielle Rocela- Faculty•HED</p>
            <p class="time">Time: Monday and Wednesday, 3:00 PM - 4:30 PM</p>
        </div>
    </div>

    <!-- Script to show students -->
    <script>
        function showStudents(subject) {
            // Here you can write logic to show the enrolled students for the selected subject
            // For demonstration purposes, let's just log the selected subject to the console
            console.log("Enrolled students for:", subject);
            // Placeholder code for displaying enrolled students (PHP section)
            document.getElementById('studentContainer').style.display = 'block';
        }

        function navigateTo(page) {
            // Here you can navigate to the specified page
            // For demonstration purposes, let's just log the page to navigate to the console
            console.log("Navigating to:", page);
        }
    </script>

    <!-- Placeholder for displaying enrolled students -->
    <div id="studentContainer" class="container" style="display: none;">
        <div class="subject">
            <h2>Information Management</h2>
            <p class="professor">Prof. Lorielle Rocela</p>
            <p class="time">Time: Monday and Wednesday, 9:00 AM - 10:30 AM</p>
            <div class="students">
                <h3>Enrolled Students:</h3>
                <?php
                // Array of student names and corresponding student numbers
                $students = array(
    array("name" => "Alexander Bataller", "number" => "202210075"),
    array("name" => "Asher Jacob Sansan", "number" => "202210077"),
    array("name" => "Bea Galvez", "number" => "202210078"),
    array("name" => "Bonf Dela Cruz", "number" => "202210079"),
    array("name" => "Chrystal Maravilla", "number" => "202210080"),
    array("name" => "Coleen Andag Pura", "number" => "202210081"),
    array("name" => "Cyrus Espiritu", "number" => "202210082"),
    array("name" => "Eunice Garcia", "number" => "202210083"),
    array("name" => "Gabriel Mendoza", "number" => "202210084"),
    array("name" => "Grace Villanueva", "number" => "202210085"),
    array("name" => "Hazel Reyes", "number" => "202210086"),
    array("name" => "Hua Shi", "number" => "202210087"),
    array("name" => "Idinagdag Mo", "number" => "202210076"),
    array("name" => "James Ivan Navales", "number" => "202210088"),
    array("name" => "Jay Calimlim", "number" => "202210089"),
    array("name" => "Jess Magannig", "number" => "202210090"),
    array("name" => "John Carlo Saulog", "number" => "202210091"),
    array("name" => "John Mark Mationg", "number" => "202210092"),
    array("name" => "Juan Rafael Luis", "number" => "202210093"),
    array("name" => "Jul Porcalla", "number" => "202210094"),
    array("name" => "Khadley Cyle Wong", "number" => "202210095"),
    array("name" => "Kirby Bagayawa", "number" => "202210096"),
    array("name" => "Mark Anthony Diano", "number" => "202210097"),
    array("name" => "Mark Joshua del Socorro", "number" => "202210098"),
    array("name" => "Peter Bautista", "number" => "202210099"),
    array("name" => "Prince Dimas", "number" => "202210100"),
    array("name" => "Rogelio Jemoya Cerenado", "number" => "202210101"),
    array("name" => "Sandra Perlas", "number" => "202210102"),
    array("name" => "SJ Peredo", "number" => "202210103"),
    array("name" => "Spike Davidson", "number" => "202210104")
    // Add more students as needed...
);

                // Loop through the students array and display their names and numbers
                foreach ($students as $student) {
                    // Generate a random profile image URL (placeholder)
                    $profileImage = "https://via.placeholder.com/40"; // Placeholder image URL
                ?>
                    <div class="student">
                        <img src="<?= $profileImage ?>" alt="<?= $student['name'] ?>">
                        <div class="student-info">
                            <span class="name"><?= $student['name'] ?></span>
                            <span class="number">Student Number: <?= $student['number'] ?></span>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
