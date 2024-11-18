<?php
session_start();
// ... rest of the code

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

// Function to sanitize input data
function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Function to hash the password
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Validate and insert data only if the action is 'signup'
if ($_POST['action'] === 'signup') {
    $fullName = sanitizeInput($_POST['fullName']);
    $email = sanitizeInput($_POST['email']);
    $password = hashPassword($_POST['password']);

    // Server-side validation (you can add more validation if needed)
    if (empty($fullName) || empty($email) || empty($_POST['password'])) {
        echo "Please fill in all fields";
    } else {
        // Check if the email is already registered
        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows > 0) {
            echo "Email address is already registered, Proceed to Login";
        } else {
            // Email is not registered, proceed with the insertion
            // Simple SQL query (replace with your actual table and column names)
            $sql = "INSERT INTO users (full_name, email, password) VALUES ('$fullName', '$email', '$password')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                echo "Sign up successful, You can sign in now !";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Close the connection
$conn->close();
?>
