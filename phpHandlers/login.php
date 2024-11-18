<?php
session_start();
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

// Validate and check login data only if the action is 'login'
if ($_POST['action'] === 'login') {
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password']; // Don't hash it here, we'll compare it later

    // Server-side validation (you can add more validation if needed)
    if (empty($email) || empty($password)) {
        echo "Please fill in all fields";
    } else {
        // Check if the email exists in the database
        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows > 0) {
            // Email exists, check if the password matches
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Set session variables for both regular users and admins
                $_SESSION['user'] = array(
                    'email' => $user['email'],
                    'fullName' => $user['full_name'],
                    'created_at' => $user['created_at'],
                    'id' => $user['id']
                    // Add other user-related data if needed
                );

                // Check if the user is an admin based on the email
                if ($email === "nilampandey@gmail.com") {
                    echo "Welcome Admin, Proceeding To Admin Page";
                    // You can add additional logic for admin login
                    $_SESSION['user']['isAdmin'] = true; // Example: Set an 'isAdmin' flag
                } else {
                    echo "Login successful, Redirecting to Homepage";
                }
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "Email address not registered";
        }
    }
}

// Close the connection
$conn->close();
?>
