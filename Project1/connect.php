<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "anosurv";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo "Failed to connect DB" . $conn->connect_error;
}
?>
