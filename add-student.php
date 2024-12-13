<?php
// Establish database connection
include('(./conn/conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $studentNO = $_POST['tbl_student_id'];
    $lastName = $_POST['student_lName'];
    $firstName = $_POST['student_fName'];
    $middleName = $_POST['student_mName'];
    $studentCourse = $_POST['student_course'];
    $yearLevel = $_POST['student_yearlevel'];
    $studentStatus = $_POST['status'];
    $qrCode = $_POST['qr_code'];

    // Check if any required field is empty
    if (empty($studentNO) || empty($lastName) || empty($firstName) || empty($studentCourse) || empty($yearLevel) || empty($studentStatus) || empty($qrCode)) {
        echo "Please fill in all the fields.";
        exit();
    }

    // Prepare SQL statement
    $sql = "INSERT INTO tbl_student (student_no, first_name, middle_name, last_name, year_level, student_course, student_status, qr_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    $success = $stmt->execute([$studentNO, $firstName, $middleName, $lastName, $yearLevel, $studentCourse, $studentStatus, $qrCode]);

    // Check if the insertion was successful
    if ($success) {
        // Redirect to the page with success message
        header('Location: ./your_success_page.php');
        exit();
    } else {
        // Handle insertion failure
        echo "Failed to add student.";
    }
}
?>
