<?php
include ('../conn/conn.php');

try {
    $stmt = $conn->prepare("DELETE FROM tbl_attendance1");
    $stmt->execute();
    header('Location: ../indexhci.php'); // Redirect back to the main page after deletion
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
