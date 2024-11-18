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

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) :
?>
<div class="sirish-ko-phool-1-container" id="container<?php echo $row["book_id"]; ?>">
            <img
              class="sirish-ko-phool-1-icon6"
              alt=""
              src="../phpHandlers/files/<?php echo $row["picture_path"]; ?>"
            />
            <div class="frame-parent36">
              <div class="frame-parent37">
                <div class="shirsh-ko-phool-frame">
                  <div class="shirsh-ko-phool3"><?php echo $row["bookname"]; ?></div>
                </div>
                <div class="parijat-container">
                  <div class="parijat3"><?php echo $row["author"]; ?></div>
                  <img
                    class="icons8-view-30-16" 
                    alt=""
                    src="../adminPanel/public/icons8view30-11@2x.png"
                    onclick="editBook(<?php echo $row['book_id']; ?>)"
                  />
                  <img
                    class="icons8-delete-60-12" 
                    alt=""
                    src="../adminPanel/public/icons8delete60-1@2x.png"
                    onclick="deleteBook(<?php echo $row['book_id']; ?>)"
                    
                  />
                </div>
              </div>
              <div class="frame-wrapper21">
                <div class="nepali-wrapper1">
                  <div class="nepali4"><?php echo $row["category_language"]; ?></div>
                </div>
              </div>
            </div>
          </div>
<?php
endwhile;
$conn->close();
?>

<script src="../myjs/adminHandler.js"></script> 
