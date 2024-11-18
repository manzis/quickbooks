<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quick_books";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if userId is set and not empty
    if (isset($_POST["userId"]) && !empty($_POST["userId"])) {
        $userid = $_POST["userId"];

        // Escape user input for security
        $userid = $conn->real_escape_string($userid);

        // Construct the SQL query with proper quoting
        $sql = "INSERT INTO downloads(user_id) VALUES ('$userid')";

        if ($conn->query($sql) === TRUE) {
            echo "Download Recorded";
        } else {
            echo "Error Recording download: " . $conn->error;
        }
    } else {
        echo "Error: userId not set or is empty.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>



