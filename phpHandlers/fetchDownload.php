<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quick_books";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

if (isset($_GET["book_id"])) {
    $bookId = $_GET["book_id"];

    // Fetch the PDF file name based on the book_id
    $sql = "SELECT pdf_path FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fileName = $row["pdf_path"];
        echo json_encode(['status' => 'success', 'fileName' => $fileName]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Book not found']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Book ID not provided']);
}

// Close the database connection
$conn->close();
?>
