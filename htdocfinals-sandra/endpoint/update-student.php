<?php
include("../conn/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if any required field is empty
    $requiredFields = ['update_student_fName', 'update_student_mName', 'update_student_lName', 'update_student_yearlevel', 'update_student_course', 'update_status', 'update_tbl_student_id'];
    $missingFields = array_filter($requiredFields, function($field) {
        return !isset($_POST[$field]) || empty($_POST[$field]);
    });

    if (!empty($missingFields)) {
        // If any required field is missing or empty, redirect with an error message
        echo "
            <script>
                alert('Please fill in all fields!');
                window.location.href = 'http://localhost/htdocfinals2/masterlist.php';
            </script>
        ";
        exit();
    } 

    // All required fields are present and not empty, proceed with updating the record
    $studentId = $_POST['update_tbl_student_id'];
    $studentName = $_POST['update_student_fName'] . ' ' . $_POST['update_student_mName'] . '. ' . $_POST['update_student_lName'];
    $studentCourse = $_POST['update_student_course'];

    try {
        $stmt = $conn->prepare("UPDATE tbl_student SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name, student_course = :student_course, year_level = :year_level, student_status = :student_status WHERE tbl_student_id = :tbl_student_id");
        
        // Bind parameters
        $stmt->bindParam(":tbl_student_id", $studentId, PDO::PARAM_STR); 
        $stmt->bindParam(":first_name", $_POST['update_student_fName'], PDO::PARAM_STR); 
        $stmt->bindParam(":middle_name", $_POST['update_student_mName'], PDO::PARAM_STR); 
        $stmt->bindParam(":last_name", $_POST['update_student_lName'], PDO::PARAM_STR); 
        $stmt->bindParam(":student_course", $_POST['update_student_course'], PDO::PARAM_STR);
        $stmt->bindParam(":year_level", $_POST['update_student_yearlevel'], PDO::PARAM_STR);
        $stmt->bindParam(":student_status", $_POST['update_status'], PDO::PARAM_STR);

        // Execute the update
        $stmt->execute();

        // Redirect after successful update
        header("Location: http://localhost/htdocfinals2/masterlist.php");
        exit();
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
}
?>
