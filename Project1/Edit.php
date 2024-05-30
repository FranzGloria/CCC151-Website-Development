<?php
include 'connect.php'; // Reuse the connection


// Check if ID is provided via GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("SELECT * FROM violation WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return the record data as JSON
        echo json_encode($row);
    } else {
        echo "No record found with ID: $id";
    }

    // Close statement and connection
    $stmt->close();
} else {
    echo "No ID provided";
}

$conn->close();
?>
