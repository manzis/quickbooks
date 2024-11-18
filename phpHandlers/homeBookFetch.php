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

while ($row = $result->fetch_assoc()):
?>

<div class="author-names-frame1" onclick="viewBook(<?php echo $row['book_id']; ?>)">
              <img
                class="sirish-ko-phool-1-icon1"
                loading="eager"
                alt=""
                src="./phpHandlers/files/<?php echo $row["picture_path"]; ?>"
              />

              <div class="frame-parent16">
                <div class="frame-parent17">
                  <div class="seto-dharti-wrapper">
                    <h2 class="seto-dharti"><?php echo $row["bookname"]; ?></h2>
                  </div>
                  <div class="amar-neupane-parent">
                    <div class="amar-neupane"><?php echo $row["author"]; ?></div>
                    <img
                      class="icons8-view-30-11"
                      loading="eager"
                      alt=""
                      src="./public/icons8view30-1@2x.png"
                    />
                  </div>
                </div>
                <div class="frame-wrapper11">
                  <div class="nepali-wrapper">
                    <div class="nepali1"><?php echo $row["category_language"]; ?></div>
                  </div>
                </div>
              </div>
            </div>


<?php
endwhile;
$conn->close();
?>
