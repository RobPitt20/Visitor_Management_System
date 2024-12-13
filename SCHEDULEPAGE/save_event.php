<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visitor_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST["eventName"];
    $eventPurpose = $_POST["eventPurpose"];
    $eventDate = $_POST["eventDate"];

    $sql = "INSERT INTO calendar (event_name, appointment_date, purpose) VALUES ('$eventName', '$eventDate', '$eventPurpose')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT id, event_name, appointment_date, created_at, purpose FROM calendar";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $events = [];

        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($events);
    } else {
        echo "No records found";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    parse_str(file_get_contents("php://input"), $_PUT);

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        echo "Missing ID parameter";
        exit;
    }

    if (isset($_PUT["eventName"]) && isset($_PUT["eventPurpose"]) && isset($_PUT["eventDate"])) {
        $eventName = $_PUT["eventName"];
        $eventPurpose = $_PUT["eventPurpose"];
        $eventDate = $_PUT["eventDate"];

        $sql = $conn->prepare("UPDATE calendar SET event_name = ?, purpose = ?, appointment_date = ? WHERE id = ?");
        $sql->bind_param("sssi", $eventName, $eventPurpose, $eventDate, $id);

        if ($sql->execute() === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql->error;
        }

        $sql->close();
    } else {
        echo "Missing data for update";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        echo "Missing ID parameter";
        exit;
    }

    $sql = $conn->prepare("DELETE FROM calendar WHERE id = ?");
    $sql->bind_param("i", $id);

    if ($sql->execute() === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
}
?>