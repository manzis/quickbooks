<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quick_books"; // Updated database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Directory for storing files
$uploadPath = __DIR__ . '/files/';

// Ensure the target directory exists
ensureDirectoryExists($uploadPath);

// Retrieve book ID from the form
$bookId = $_POST['bookId'];

// Retrieve other form data
$bookname = $conn->real_escape_string($_POST['bookname']);
$category_language = isset($_POST['category_language']) ? $conn->real_escape_string($_POST['category_language']) : '';
$publisher = $conn->real_escape_string($_POST['publisher']);
$author = isset($_POST['author']) ? $conn->real_escape_string($_POST['author']) : '';
$date = isset($_POST['date']) ? $conn->real_escape_string($_POST['date']) : '';
$author_description = isset($_POST['author_description']) ? $conn->real_escape_string($_POST['author_description']) : '';
$bookDescription = isset($_POST['bookDescription']) ? $conn->real_escape_string($_POST['bookDescription']) : '';

// Initialize variables to store file paths
$picturePath = null;
$pdfPath = null;

// Check if new picture file is uploaded
if (isset($_FILES['PictureContent']['name']) && !empty($_FILES['PictureContent']['name'])) {
    // If new picture file is uploaded, upload it and update $picturePath
    $picturePath = uploadFile('PictureContent', $uploadPath);
} else {
    // If no new picture file is uploaded, retain the previous picture path from the database
    $picturePath = fetchPreviousPicturePath($conn, $bookId);
}

// Check if new PDF file is uploaded
if (isset($_FILES['fileContent']['name']) && !empty($_FILES['fileContent']['name'])) {
    // If new PDF file is uploaded, upload it and update $pdfPath
    $pdfPath = uploadFile('fileContent', $uploadPath);
} else {
    // If no new PDF file is uploaded, retain the previous PDF path from the database
    $pdfPath = fetchPreviousPdfPath($conn, $bookId);
}

// Construct the SQL query
$sql = "UPDATE books SET bookname=?, category_language=?, publisher=?, author=?, published_date=?, author_description=?, book_description=?, picture_path=?, pdf_path=? WHERE book_id=?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo "error|Error preparing SQL statement: " . $conn->error;
    exit;
}

// Bind parameters
$stmt->bind_param("sssssssssi", $bookname, $category_language, $publisher, $author, $date, $author_description, $bookDescription, $picturePath, $pdfPath, $bookId);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "success|Book updated successfully!";
    } else {
        echo "error|No rows were affected by the update.";
    }
} else {
    echo "error|Error executing SQL query: " . $stmt->error;
}

$stmt->close();
$conn->close();

function uploadFile($fileInputName, $targetDirectory)
{
    $targetFile = $targetDirectory . basename($_FILES[$fileInputName]['name']);

    if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
        // Return only the file name, not the full path
        return basename($_FILES[$fileInputName]['name']);
    } else {
        return null;
    }
}

function fetchPreviousPicturePath($conn, $bookId)
{
    // Fetch the previous picture path from the database based on $bookId
    // Here, replace 'picture_path' with the actual column name in your database table
    $sql = "SELECT picture_path FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $stmt->bind_result($picturePath);
    $stmt->fetch();
    $stmt->close();
    
    return $picturePath;
}

function fetchPreviousPdfPath($conn, $bookId)
{
    // Fetch the previous PDF path from the database based on $bookId
    // Here, replace 'pdf_path' with the actual column name in your database table
    $sql = "SELECT pdf_path FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $stmt->bind_result($pdfPath);
    $stmt->fetch();
    $stmt->close();
    
    return $pdfPath;
}

function ensureDirectoryExists($directory)
{
    if (!file_exists($directory) && !is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
}
?>
