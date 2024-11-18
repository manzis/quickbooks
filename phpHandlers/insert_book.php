<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quick_books";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Directory for storing files
$uploadPath = __DIR__ . '/files/';

// Ensure the target directory exists
ensureDirectoryExists($uploadPath);

$picturePath = uploadFile('PictureContent', $uploadPath);
$pdfPath = uploadFile('fileContent', $uploadPath);

$bookname = $conn->real_escape_string($_POST['bookname']);
$category = $conn->real_escape_string($_POST['selectLanguage']);
$publisherName = $conn->real_escape_string($_POST['publisher']);
$authorName = $conn->real_escape_string($_POST['authorName']);
$publishedate = $conn->real_escape_string($_POST['date']);
$authorDescription = $conn->real_escape_string($_POST['authorDes']);
$bookDescription = $conn->real_escape_string($_POST['bookDescription']);

$sql = "INSERT INTO books (bookname, category_language, publisher, author, published_date, author_description, book_description, picture_path, pdf_path) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $bookname, $category, $publisherName, $authorName, $publishedate, $authorDescription, $bookDescription, $picturePath, $pdfPath);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "success|Book created successfully!";
    } else {
        echo "error|No rows were affected by the insertion.";
    }
} else {
    echo "error|Error: " . $stmt->error;
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


function ensureDirectoryExists($directory)
{
    if (!file_exists($directory) && !is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
}
?>
