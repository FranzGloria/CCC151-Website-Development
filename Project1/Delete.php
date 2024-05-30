<?php
include 'connect.php'; // Reuse the connection


// Check if ID is provided via GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("DELETE FROM violation WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
} else {
    echo "No ID provided";
}

$conn->close();
?>
