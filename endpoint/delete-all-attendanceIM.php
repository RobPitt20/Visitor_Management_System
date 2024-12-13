<?php
include ('../conn/conn.php');

try {
    $stmt = $conn->prepare("DELETE FROM tbl_attendance");
    $stmt->execute();
    header('Location: ../indexadmin.php'); // Redirect back to the main page after deletion
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
