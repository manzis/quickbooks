<?php
if (isset($_POST['create'])) {
    // Database connection parameters
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "quick_books";

    // Create a connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user input from the form
    $bookname = $_POST['bookname'];
   

    // Simple SQL query (replace with your actual table and column names)
    $sql = "INSERT INTO createBook(bookname) VALUES ('$bookname')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}

?>