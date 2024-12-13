<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List with QR Codes</title>
</head>
<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>QR Code</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the library
                include "phpqrcode/qrlib.php";

                // Function to generate QR code and return the HTML for displaying it
                function generateQRCode($data) {
                    // Generate QR code content
                    $qr_content = "Student ID: " . $data['student_id'] . "\n" .
                                  "Last Name: " . $data['last_name'] . "\n" .
                                  "First Name: " . $data['first_name'] . "\n" .
                                  "Middle Name: " . $data['middle_name'] . "\n" .
                                  "Course: " . $data['course'] . "\n" .
                                  "Year: " . $data['year'] . "\n" .
                                  "Status: " . $data['status'] . "\n" .
                                  "Scan Time: " . date("Y-m-d H:i:s");

                    // Generate QR code image filename
                    $qr_filename = "qr_codes/" . $data['student_id'] . ".png";

                    // Generate QR code image
                    QRcode::png($qr_content, $qr_filename);

                    // Return HTML for displaying QR code
                    return "<img src='$qr_filename' alt='QR Code'>";
                }

                // Array of student information
                $students = [
                    ["student_id" => "202210001", "last_name" => "Bataller", "first_name" => "Alexander", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210002", "last_name" => "Sansan", "first_name" => "Asher Jacob", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210003", "last_name" => "Galvez", "first_name" => "Bea", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210004", "last_name" => "Del Cruz", "first_name" => "Bonf", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210005", "last_name" => "Pura", "first_name" => "Coleen Andag", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210006", "last_name" => "Garcia", "first_name" => "Eunice", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210007", "last_name" => "Mendoza", "first_name" => "Gabriel", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210008", "last_name" => "Villanueva", "first_name" => "Grace", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210009", "last_name" => "Reyes", "first_name" => "Hazel", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210010", "last_name" => "Shi", "first_name" => "Hua", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210011", "last_name" => "Navales", "first_name" => "James Ivan", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210012", "last_name" => "Calimlim", "first_name" => "Jay", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210013", "last_name" => "Magannig", "first_name" => "Jess", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210014", "last_name" => "Saulog", "first_name" => "John Carlo", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210015", "last_name" => "Mationg", "first_name" => "John Mark", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210016", "last_name" => "Luis", "first_name" => "Juan Rafael", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210017", "last_name" => "Porcalla", "first_name" => "Jul", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210018", "last_name" => "Wong", "first_name" => "Khadley Cyle", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210019", "last_name" => "Bagayawa", "first_name" => "Kirby", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210020", "last_name" => "Bautista", "first_name" => "Peter", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210021", "last_name" => "Dimas", "first_name" => "Prince", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210022", "last_name" => "Cerenado", "first_name" => "Rogelio Jemoya", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210023", "last_name" => "Perlas", "first_name" => "Sandra", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210024", "last_name" => "Peredo", "first_name" => "SJ", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"],
                    ["student_id" => "202210025", "last_name" => "Davidson", "first_name" => "Spike", "middle_name" => "", "course" => "Bachelor of Science in Information Technology", "year" => "2nd year", "status" => "Regular"]
                ];

                // Loop through each student and generate a row in the table
                foreach ($students as $row_number => $student) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $student['student_id'] . "</th>";
                    echo "<td>" . $student['last_name'] . "</td>";
                    echo "<td>" . $student['first_name'] . "</td>";
                    echo "<td>" . $student['middle_name'] . "</td>";
                    echo "<td>" . $student['course'] . "</td>";
                    echo "<td>" . $student['year'] . "</td>";
                    echo "<td>" . $student['status'] . "</td>";
                    echo "<td>" . generateQRCode($student) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
