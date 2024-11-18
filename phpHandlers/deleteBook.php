<?php
// deleteBook.php

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
    $bookId = $_POST["book_id"];

    // Perform deletion
    $sql = "DELETE FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookId);

    if ($stmt->execute()) {
        $response = array("status" => "success", "message" => "Book deleted successfully");
    } else {
        $response = array("status" => "error", "message" => "Error deleting book: " . $stmt->error);
    }

    // Output the response as JSON
    echo json_encode($response);

    $stmt->close();
}

$conn->close();
?>
