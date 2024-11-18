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
    $userid = $_POST["userId"];
    $useremail = $_POST["useremail"];
    $username = $_POST["username"];
    
    // Escape user input for security
    $userid = $conn->real_escape_string($userid);
    $useremail = $conn->real_escape_string($useremail);
    $username = $conn->real_escape_string($username);

    // Construct the SQL query with proper quoting
    $sql = "UPDATE users SET full_name='$username', email='$useremail' WHERE id='$userid'";

    if ($conn->query($sql) === TRUE) {
        echo "Profile Updated Successfully";
    } else {
        echo "Error Updating Profile: " . $conn->error;
    }
}

$conn->close();
?>
