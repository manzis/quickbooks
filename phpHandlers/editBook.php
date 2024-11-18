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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["book_id"])) {
    $bookId = $_GET["book_id"];

    // Fetch book details
    $sql = "SELECT * FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Include HTML form to display and pre-fill book details
        
    } else {
        // Handle case where book is not found
        echo "Error: Book not found";
    }

    $stmt->close();
} else {
    // Handle case where book_id is not set in the request
    echo "Error: Invalid request";
}

$conn->close();
?>
<div class="frame-parent48">
        <form class="frame-form" id="EditBookForm">
          <div class="frame-parent49">
            <div class="name-of-book-wrapper">
              <div class="name-of-book">Name of Book :</div>
            </div>
            <div class="ex-shrish-ko-phool-wrapper">
              <input
                class="ex-shrish-ko"
                name="bookname"
                id="bookname"
                placeholder="Ex. Shrish ko Phool"
                value="<?php echo $row["bookname"]; ?>"    
                type="text"
              />
            </div>
          </div>
          <div class="frame-parent50">
            <div class="select-categorylanguage-wrapper">
              <div class="select-categorylanguage">
                Select Category/Language :
              </div>
            </div>
            <div class="frame-wrapper27">
              <select class="american-parent" id="selectLanguage" name="category_language">
                <option value="American"<?php if ($row['category_language'] == 'American') echo 'selected'; ?>>American</option>
                <option value="Nepali"<?php if ($row['category_language'] == 'Nepali') echo 'selected'; ?>>Nepali</option>
                <option value="Indian"<?php if ($row['category_language'] == 'Indian') echo 'selected'; ?>>Indian</option>
                <option value="Chinese"<?php if ($row['category_language'] == 'Chinese') echo 'selected'; ?>>Chinese</option>
                <option value="Mongolian"<?php if ($row['category_language'] == 'Mongolian') echo 'selected'; ?>>Mongolian</option>
                <option value="Urdu"<?php if ($row['category_language'] == 'Urdu') echo 'selected'; ?>>Urdu</option>
                <option value="Korean"<?php if ($row['category_language'] == 'Korean') echo 'selected'; ?>>Korean</option>
              </select>
            </div>
          </div>
          <div class="frame-parent51">
            <div class="publisher-wrapper">
              <div class="publisher">Publisher :</div>
            </div>
            <div class="pubilisher-wrapper">
              <input
                class="pubilisher"
                name="publisher"
                id="publisher"
                placeholder="Ex.Publisher Name"
                type="text" value="<?php echo $row["publisher"]; ?>"
                
              />
            </div>
          </div>
          <div class="frame-parent52">
            <div class="author-name-wrapper">
              <div class="author-name1">Author Name :</div>
            </div>
            <div class="author-name-container">
              <input
                class="author-name2"
                id="autorname"
                name="author"
                placeholder="Ex. Author Name"
                type="text" value="<?php echo $row["author"]; ?>"
              />
            </div>
          </div>
          <div class="frame-parent53">
            <div class="published-date-wrapper">
              <div class="published-date">Published Date :</div>
            </div>
            <div class="published-date-container">
              <input
                class="published-date1"
                name="date"
                id="date"
                type="date" value="<?php echo $row["published_date"]; ?>"
              />
            </div>
          </div>
          <div class="frame-parent54">
            <div class="author-description-wrapper">
              <div class="author-description">Author Description :</div>
            </div>
            <div class="description-of-author-wrapper">
              <textarea class="description-of-author" placeholder="Description of Author" value="" name="author_description">
<?php echo $row['author_description']; ?></textarea>  
            </div>
          </div>
          <div class="frame-wrapper28">
            <div class="frame-parent55">
              <div class="books-description-wrapper">
                <div class="books-description">Books Description :</div>
              </div>
              <div class="description-of-book-wrapper">
                <input
                  class="description-of-book"
                  name="bookDescription"
                  id="bookDescription"
                  placeholder="Description of Book"
                  type="text" value="<?php echo $row['book_description']; ?>"
                />
              </div>
            </div>
          </div>
          <div class="frame-parent56">
            <div class="frame-parent57">
              <div class="frame-parent58">
                <div class="upload-picture-wrapper">
                  <div class="upload-picture">Upload Picture</div>
                </div>
                <div class="icons8-upload-48-1-wrapper">
                  <img
                    class="icons8-upload-48-1"
                    alt=""
                    src="./public/icons8-upload-48.png"
                  />
                </div>
              </div>
              <div class="frame-wrapper29">
                <input class="frame-input" type="file" accept="image/*"  name="PictureContent"/>
              </div>
            </div>
            <div class="frame-parent59">
              <div class="frame-parent60">
                <div class="upload-pdf-wrapper">
                  <div class="upload-pdf">Upload Pdf</div>
                </div>
                <div class="icons8-upload-48-1-container">
                  <img
                    class="icons8-upload-48-11"
                    alt=""
                    src="./public/icons8-upload-48.png"
                  />  
                </div>
              </div>
              <div class="frame-wrapper30">
                <input class="frame-child47" type="file" accept=".pdf, .doc, .docx" name="fileContent" />
              </div>
            </div>
          </div>
          <div class="frame-wrapper31">
            <div class="frame-parent61">
              <div class="frame-wrapper32">
                <div class="icons8-home-30-1-parent3" onclick="updateBook(<?php echo $row['book_id']; ?>);">
                  <img
                    class="icons8-home-30-18"
                    alt=""
                    src="./public/icons8home30-14@2x.png"
                  />
                  <div class="frame-wrapper33" >
                    <div class="home-login-wrapper4">
                    <div class="home-login9">Update</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="frame-wrapper34">
                <button class="icons8-home-30-1-parent4" id="button">
                  <img
                    class="icons8-home-30-19"
                    alt=""
                    src="./public/icons8home30-13@2x.png"
                  />
                  <div class="frame-wrapper35">
                    <div class="home-login-wrapper5">
                      <div class="home-login10">Cancel</div>
                    </div>
                  </div>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>   
      <script src="../myjs/updateHandler.js"></script> 