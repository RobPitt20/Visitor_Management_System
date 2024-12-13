<?php
include ('./conn/conn.php');

// Fetch attendance data
$stmt = $conn->prepare("SELECT *, CONCAT(last_name, ', ', first_name) AS student_name FROM tbl_attendance LEFT JOIN tbl_student ON tbl_student.tbl_student_id = tbl_attendance.tbl_student_id");
$stmt->execute();
$result = $stmt->fetchAll();

// Set the headers to indicate a file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="attendance-information-management.csv"');


// Open a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Write the title row
fputcsv($output, ['Attendance - Information Management']);
fputcsv($output, []); // Empty row for spacing

// Write the column headers
fputcsv($output, ['ID', 'Name', 'Course', 'Time In']);

// Write the data
foreach ($result as $row) {
    // Format the time_in field to be more readable
    $formattedTimeIn = date("Y-m-d H:i:s", strtotime($row["time_in"]));
    
    fputcsv($output, [
        $row["tbl_attendance_id"],
        $row["student_name"],
        $row["student_course"],
        $formattedTimeIn
    ]);
}

// Close the file pointer
fclose($output);
exit;
?>
