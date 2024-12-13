<?php
// Establish database connection
include('./conn/conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['first_name'];
    $middleName = $_POST['middle_name'];
    $lastName = $_POST['last_name'];
    $yearLevel = $_POST['year_level'];
    $studentCourse = $_POST['student_course'];
    $studentStatus= $_POST['student_status'];
    $studentNO = $_POST['student_no'];
     $qrCode = $_POST['qr_code'];

    // Check if any required field is empty
    if (empty($firstName) || empty($studentCourse) || empty($qrCode)) {
        echo "Please fill in all the fields.";
        exit();
    }

    try {
        // Establish database connection
        $conn = new PDO("mysql:host=localhost;dbname=qr_attendance_db", "root", "");
        // Set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement for inserting into tbl_student
        $sql = "INSERT INTO tbl_student (first_name, middle_name, last_name, year_level, student_course, student_status, student_no, qr_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        // Prepare and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->execute([$firstName, $middleName, $lastName, $yearLevel, $studentCourse, $studentStatus, $studentNO, $qrCode]);

        // Check if the insertion was successful
        if ($stmt->rowCount() > 0) {
            // Redirect to the page with success message
            header("Location: http://localhost/htdocfinals2/masterlist.php");
            exit();
        } else {
            // Handle insertion failure
            echo "Failed to add student: No rows affected.";
        }


        // Prepare SQL statement for inserting into tbl_student (from second code snippet)
        $stmt = $conn->prepare("INSERT INTO tbl_student (student_name, course_section, qr_code) VALUES (:student_name, :course_section, :qr_code)");
        $stmt->bindParam(":student_name", $firstName, PDO::PARAM_STR); 
        $stmt->bindParam(":course_section", $studentCourse, PDO::PARAM_STR);
        $stmt->bindParam(":qr_code", $qrCode, PDO::PARAM_STR);
        $stmt->execute();
        
        // Redirect to the masterlist page
        header("Location: http://localhost/qr-code-attendance-system/masterlist.php");
        exit();

    } catch(PDOException $e) {
        // Log error to a file or output in a more organized way
        echo "Failed to add student: " . $e->getMessage();
    }
}
?>