<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Attendance System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

         body {
        background-color: whitesmoke; /* Change background color to green */
        /* Remove the existing background gradient animation */
        background-size: auto;
        animation: none;
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

        .main {
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

        .student-container {
            height: 90%;
            width: 90%;
            border-radius: 20px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .student-container > div {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            padding: 30px;
            height: 100%;
        }

        .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table.dataTable thead > tr > th.sorting,
        table.dataTable thead > tr > th.sorting_asc,
        table.dataTable thead > tr > th.sorting_desc,
        table.dataTable thead > tr > th.sorting_asc_disabled,
        table.dataTable thead > tr > th.sorting_desc_disabled,
        table.dataTable thead > tr > td.sorting,
        table.dataTable thead > tr > td.sorting_asc,
        table.dataTable thead > tr > td.sorting_desc,
        table.dataTable thead > tr > td.sorting_asc_disabled,
        table.dataTable thead > tr > td.sorting_desc_disabled {
            text-align: center;
        }

        /* Styles for Subjects Page */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: navajowhite;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-4" href="#">QR Code Attendance System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="./subject.php">Subjects  |</a>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Logout  |</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h1>Subjects</h1>
        <div class="subject" onclick="showStudents('Information Management')">
            <h2><img src="logo.jpg" alt="Information Management Logo"> Information Management</h2>
            <p class="professor">Prof. Lorielle Rocela- Faculty•HED - SY.2023-2024•2nd semester </p>
            <p class="time">Time: Monday and Wednesday, 9:00 AM - 10:30 AM</p>
        </div>
        <div class="subject" onclick="showStudents('Human Computer Interaction')">
            <h2><img src="logo.jpg" alt="Human Computer Interaction Logo"> Human Computer Interaction </h2>
            <p class="professor">Prof. Glen Jose Y. Sano- Faculty•HED - SY.2023-2024•2nd semester</p>
            <p class="time">Time: Tuesday and Thursday, 1:00 PM - 2:30 PM</p>
        </div>
     
    </div>

    <!-- Script to show students -->
    <script>
          function showStudents(subject) {
        // Check if the subject is "Information Management"
        if (subject === 'Information Management') {
            // Redirect to the infomanagement.php page
            window.location.href = 'infomanagement.php';
        } else if (subject === 'Human Computer Interaction') {
            // Redirect to the hci.php page
            window.location.href = 'hci.php';
        } else {
            // Placeholder code for displaying enrolled students
            console.log("Enrolled students for:", subject);
            document.getElementById('studentContainer').style.display = 'block';
        }
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
