<?php
include("../conn/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['qr_code'])) {
        $qrCode = $_POST['qr_code'];

        try {
            $conn->beginTransaction();

            // Prepare and execute the select statement
            $selectStmt = $conn->prepare("SELECT tbl_student_id FROM tbl_student WHERE qr_code = :qr_code");
            $selectStmt->bindParam(":qr_code", $qrCode, PDO::PARAM_STR);

            if ($selectStmt->execute()) {
                $result = $selectStmt->fetch();
                if ($result !== false) {
                    $studentID = $result["tbl_student_id"];
                    $timeIn = date("Y-m-d H:i:s");

                    // Prepare and execute the insert statement
                    $stmt = $conn->prepare("INSERT INTO tbl_attendance (tbl_student_id, time_in) VALUES (:tbl_student_id, :time_in)");
                    $stmt->bindParam(":tbl_student_id", $studentID, PDO::PARAM_STR);
                    $stmt->bindParam(":time_in", $timeIn, PDO::PARAM_STR);

                    $stmt->execute();
                    
                    // Commit the transaction
                    $conn->commit();

                    // Redirect after successful insertion
                    header("Location: http://localhost/htdocfinals2/QrScanner.php");
                    exit();
                } else {
                    // Rollback transaction if no student found
                    $conn->rollBack();
                    echo "No student found in QR Code";
                }
            } else {
                // Rollback transaction if select statement execution failed
                $conn->rollBack();
                echo "Failed to execute the statement.";
            }
        } catch (PDOException $e) {
            // Rollback transaction in case of error
            $conn->rollBack();
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "
            <script>
                alert('Please fill in all fields!');
                window.location.href = 'http://localhost/qr-code-attendance-system/index.php';
            </script>
        ";
    }
}
?>
