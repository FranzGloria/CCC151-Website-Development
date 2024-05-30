<?php
include 'connect.php'; // Reuse the connection


// Check if ID and POST data are provided
if (isset($_GET['id']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $violation = $_POST['violation'];
    $violation = $_POST['date'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("UPDATE violation SET firstName = ?, lastName = ?, age = ?, violation = ?, date = ? WHERE id = ?");
    $stmt->bind_param("ssisi", $firstName, $lastName, $age, $violation, $date, $id);

    // Execute statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
} else {
    echo "No ID provided or invalid request method";
}

$conn->close();
?>
