<?php 

include("connect.php"); // Reuse the connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $violation = $_POST['violation'];

    $stmt = $conn->prepare("INSERT INTO violation (firstName, lastName, age, violation, date) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->bind_param("ssis", $firstName, $lastName, $age, $violation);

    if ($stmt->execute()) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<?php 
session_start();
include("connect.php"); // Reuse the connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $violation = $_POST['violation'];

    $stmt = $conn->prepare("INSERT INTO violation (firstName, lastName, age, violation, date) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->bind_param("ssis", $firstName, $lastName, $age, $violation);

    if ($stmt->execute()) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anosurv | Home Page</title>
    <link rel="stylesheet" href="Homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900&display=swap" rel="stylesheet">
    <style>
        /* Inline CSS for demonstration purposes */
        .navigation a.logo {
            font-family: 'Jomhuria', sans-serif;
            font-size: 100px;
            text-shadow: -5px -5px 0 #474747,  
                         5px -5px 0 #474747,
                        -5px  5px 0 #474747,
                         5px  5px 0 #474747;
        }
        
        /* Apply Lato font to navigation links */
        .navigation a:not(.logo) {
            font-family: 'Lato', sans-serif;
            font-size: 16px; /* Adjust font size as needed */
        }

        /* Custom styles for the headings */
        h1.heading1, h1.heading2 {
            font-family: 'Oswald', sans-serif; /* Change font family */
            font-size: 90px; /* Change font size */
            transition: transform 12s ease; /* Add transition */
        }

        .highlight {
            color: rgb(216, 203, 89); /* Make the text yellow */
        }

        /* Add hover effect */
        h1.heading1:hover, h1.heading2:hover {
            transform: scale(1.02); /* Scale up by 5% */
        }

        /* Inline CSS for demonstration purposes */
        body {
            background-image: url("Image/here.jpg");
            background-size: cover; /* Ensure the image covers the entire background */
            background-repeat: no-repeat; /* Prevent repeating of the image */
            background-attachment: fixed; /* Make the background image fixed when scrolling */
            background-position: center; /* Center the background image */
            margin: 0; /* Remove default body margin */
        }

        /* Add space between logout and data */
        .navigation a:nth-last-child(2) {
            margin-right: 20px;
        }

        /* Fixed position for the first heading */
        .heading1 {
            position: fixed;
            top: 60%; /* Adjust this value to move vertically */
            left: 80%; /* Adjust this value to move horizontally */
            transform: translate(-50%, -50%);
            text-align: center;
            white-space: nowrap; /* Prevent text from wrapping */
            text-shadow: -3px -3px 0 #7a7a7a,  
                         3px -3px 0 #696969,
                        -3px  3px 0 #696969,
                         3px  3px 0 #7a7a7a;
        }

        /* Fixed position for the second heading */
        .heading2 {
            position: fixed;
            top: 70%; /* Adjust this value to move vertically */
            left: 70%; /* Adjust this value to move horizontally */
            transform: translate(-50%, -50%);
            text-align: center;
            white-space: nowrap; /* Prevent text from wrapping */
            text-shadow: -3px -3px 0 #7a7a7a,  
                         3px -3px 0 #696969,
                        -3px  3px 0 #696969,
                         3px  3px 0 #7a7a7a;
        }

        .container {
            width: 100%;
            overflow: hidden; /* Ensure the container handles overflow */
        }

        .crud-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(107, 107, 107, 0.3);
        }

        h1 {
            text-align: center;
            color: rgba(202, 190, 81, 1);
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: rgba(202, 190, 81, 1);
            color: #fff;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: rgba(202, 190, 81, 1);
            color: #fff;
        }

        td:last-child {
            text-align: center;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #3498db;
            color: #fff;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <a href="#" class="logo">ANOSURV</a>
            <a href="homepage.php">Home</a>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <a href="Data.php">Data</a>
            <a href="Index.php">Logout</a>
        </div>
    </div>

    <div class="crud-container">
        <h1>Violation of Safety Protocol Logs</h1>
        <form id="crud-form" method="post" action="Data.php">
            <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" required>
            <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name" required>
            <input type="number" name="age" id="age" placeholder="Enter Age" required>
            <input type="text" name="violation" id="violation" placeholder="Enter Violation" required>
            <input type="submit" name="submit" value="Submit Information">
        </form>
        <table id="item-list">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Violation</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from the database and display it in the table
                $result = $conn->query("SELECT * FROM violation");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['firstName'] . "</td>";
                        echo "<td>" . $row['lastName'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['violation'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>
                                <button class='edit-btn' onclick='editItem(" . $row['id'] . ")'>Edit</button>
                                <button class='delete-btn' onclick='deleteItem(" . $row['id'] . ")'>Delete</button>
                              </td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // Your existing JavaScript functions for edit and delete
        function editItem(id) {
            // Implement the edit functionality here
        }

        function deleteItem(id) {
            // Implement the delete functionality here
        }
    </script>
</body>
</html>

