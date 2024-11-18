<?php

session_start();
$userid = $_SESSION['user']['id'];

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

if (isset($_GET["book_id"])) {
    $bookId = $_GET["book_id"];
    error_reporting(E_ALL);
ini_set('display_errors', 1);

    

    // Fetch book details based on the book_id
    $sql = "SELECT * FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
<div class="frame-wrapper50">
        <div class="frame-parent80">
          <div class="login-landpage-parent">
            <div class="login-landpage8">
              <div class="login-landpage-inner3">
                <div class="recipe-book-wrapper3">
                  <b class="recipe-book15"><?php echo $row["bookname"];?></b>
                </div>
              </div>
              <div class="recipes-that-makes-every-food-wrapper1">
                <div class="recipes-that-makes7"><?php echo $row["book_description"];?>
                </div>
              </div>
              <div class="login-landpage-inner4">
                <div class="frame-wrapper51">
                  <div class="frame-wrapper52">
                    <button class="frame-wrapper53" id="backBtn" onclick="goBackPrevious();">
                      <div class="icons8-home-30-1-parent6">
                        <img
                          class="icons8-home-30-111"
                          alt=""
                          src="./public/back.png"
                        />

                        <div class="frame-wrapper54">
                          <div class="home-login-wrapper7">
                            <div class="home-login12">Go Back</div>
                          </div>
                        </div>
                      </div>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="about-book-wrapper">
              <div class="about-book">About Book :</div>
            </div>
            <div class="frame-wrapper55">
              <div class="frame-parent81">
                <div class="frame-parent82">
                  <div class="author-wrapper">
                    <div class="author">Author</div>
                  </div>
                  <div class="dr-ram-yadv-wrapper">
                    <div class="dr-ram-yadv"><?php echo $row["author"];?></div>
                  </div>
                </div>
                <div class="frame-parent83">
                  <div class="publisher-container">
                    <div class="publisher1">Publisher</div>
                  </div>
                  <div class="asian-publication-wrapper">
                    <div class="asian-publication"><?php echo $row["publisher"];?></div>
                  </div>
                </div>
                <div class="frame-parent84">
                  <div class="published-date-frame">
                    <div class="published-date2">Published Date</div>
                  </div>
                  <div class="wrapper3">
                    <div class="div7"><?php echo $row["published_date"];?></div>
                  </div>
                </div>
                <div class="frame-parent85">
                  <div class="language-wrapper">
                    <div class="language">Language</div>
                  </div>
                  <div class="nepali-wrapper11">
                    <div class="nepali14"><?php echo $row["category_language"];?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="frame-parent86">
              <div class="about-author-wrapper">
                <div class="about-author">About Author :</div>
              </div>
              <div class="dr-ram-yad-is-famous-writes-a-wrapper">
                <div class="dr-ram-yad">
                <?php echo $row["author_description"];?>
                </div>
              </div>
            </div>
          </div>
          <div class="seto-dharti-new-edition-amar-n-parent">
            <img
              class="seto-dharti-new-edition-amar-n-icon"
              alt=""
              src="../phpHandlers/files/<?php echo $row["picture_path"];?>"
            />

            <button class="frame-wrapper56" onclick="downloadClick(<?php echo $row['book_id'];?>,<?php echo $userid ?>);">
              <div class="icons8-download-52-1-parent">
                <img
                  class="icons8-download-52-1"
                  alt=""
                  src="./public/icons8download52-1@2x.png"
                />

                <div class="download-book">Download Book</div>
              </div>
            </button>
          </div>
        </div>
      </div>
    </div> 
    <?php
} else {
    // Handle case where book is not found
    echo "Error: Book not found";
}

$stmt->close();
} else {
// Handle case where book_id is not set in the request
echo "Error: Book ID not provided";
}

// Close the database connection
$conn->close(); 

    ?>
    