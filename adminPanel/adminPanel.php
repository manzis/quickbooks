<?php
session_start();

?>

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

// Query to count the number of books
$bookCountQuery = "SELECT COUNT(*) as bookCount FROM books";
$bookCountResult = $conn->query($bookCountQuery);

// Check if the book count query was successful
if ($bookCountResult) {
    // Fetch the count from the result
    $bookCountRow = $bookCountResult->fetch_assoc();
    
    // Get the book count value
    $bookCount = $bookCountRow['bookCount'];
} else {
    // Handle error if the book count query fails
    $bookCount = 0;
}

// Query to count the number of users
$userCountQuery = "SELECT COUNT(*) as userCount FROM users";
$userCountResult = $conn->query($userCountQuery);

// Check if the user count query was successful
if ($userCountResult) {

    $userCountRow = $userCountResult->fetch_assoc();
    
    // Get the user count value
    $userCount = $userCountRow['userCount'];
} else {

    $userCount = 0;
}
$downloadCountQuery = "SELECT COUNT(*) as downloadCount FROM downloads";
$downloadCountResult = $conn->query($downloadCountQuery);

if ($downloadCountResult) {
    // Fetch the count from the result
    $downloadCountRow = $downloadCountResult->fetch_assoc();
    

    $downloadCount = $downloadCountRow['downloadCount'];
} else {
   
    $downloadCount = 0;
}


$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./admin.css" />
    <link rel="stylesheet" href="./global.css"/>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Fredoka One:wght@400&display=swap"
    />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../myjs/auth.js"></script>
  </head>
  <body>
    <div class="frame-parent22">
      <header class="frame-header" id="myHeader" header="head">
        <div class="christmas-2012-new-1771-1-parent1">
          <img
            class="christmas-2012-new-1771-1-icon6"
            alt=""
            src="./public/logo.png"
          />

          <div class="quick-books-wrapper">
            <b class="quick-books4"> Quick Books</b>
          </div>
        </div>
        <div class="frame-parent23">
          <div class="home-group">
            <div class="home8">Home</div>
            <div class="contact-us4">Contact Us</div>
          </div>
          <div class="icons8-test-account-60-1-wrapper">
            <img
              class="icons8-test-account-60-1"
              alt=""
              src="./public/icons8testaccount60-1@2x.png"
            />
          </div>
        </div>
      </header>
      <div class="frame-parent24">
        <div class="login-landpage-wrapper2">
          <div class="login-landpage6">
            <div class="login-landpage-inner">
              <div class="recipe-book-wrapper1">
                <div class="recipe-book13">Admin Profile</div>
              </div>
            </div>
            <div class="recipes-that-makes-every-food-frame">
              <div class="recipes-that-makes-container">
                <p class="welcome-manjish">
                  <span class="welcome">Welcome </span>
                  <b class="manjish">Nilam</b>
                  <span class="span">,</span>
                </p>
                <p class="edit-create-and">Edit, Create and Save Books.</p>
              </div>
            </div>
            <div class="login-landpage-child">
              <div class="frame-parent25">
                <div class="frame-wrapper14">
                  <div class="frame-wrapper15">
                    <button
                      class="icons8-home-30-1-parent1"
                      id="logoutBtn"
                    >
                      <img
                        class="icons8-home-30-16"
                        alt=""
                        src="./public/icons8home30-13@2x.png"
                      />
                      <div class="frame-wrapper16">
                        <div class="home-login-wrapper2">
                          <div class="home-login7">Log Out</div>
                        </div>
                      </div>
                    </button>
                  </div>
                </div>
                <div class="frame-child46"></div>
                <div class="frame-wrapper17">
                  <button class="icons8-home-30-1-parent2" id="createBook">
                    <img
                      class="icons8-home-30-17"
                      alt=""
                      src="./public/icons8home30-14@2x.png"
                    />

                    <div class="frame-wrapper18">
                      <div class="home-login-wrapper3">
                        <div class="home-login8">Create Book</div>
                      </div>
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="frame-parent26">
          <div class="frame-parent27">
            <div class="total-books-wrapper">
              <div class="total-books">Total Books</div>
            </div>
            <div class="wrapper">
              <div class="div2"><?php echo $bookCount; ?></div>
            </div>
          </div>
          <div class="frame-parent28">
            <div class="total-users-wrapper">
              <div class="total-users">Total Users</div>
            </div>
            <div class="container">
              <div class="div3"><?php echo $userCount; ?></div>
            </div>
          </div>
          <div class="frame-parent29">
            <div class="total-downloads-wrapper">
              <div class="total-downloads">Total Downloads</div>
            </div>
            <div class="frame">
              <div class="div4"><?php echo $downloadCount?></div>
            </div>
          </div>
          <div class="frame-parent30">
            <div class="total-downloads-container">
              <div class="total-downloads1">Total Book Views</div>
            </div>
            <div class="wrapper1">
              <div class="div5">287</div>
            </div>
          </div>
        </div>
        <div class="books-created-wrapper">
          <b class="books-created">Books Created </b>
        </div>
        
        <div class="frame-parent31">
          
          <?php include '../phpHandlers/booksFetch.php'; ?> 
        </div>
    <div id="framePopup" class="popup-overlay" style="display: none">
      <div class="frame-parent48">
        <form class="frame-form" id="CreateBookForm">
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
              <select class="american-parent" id="selectLanguage"name="selectLanguage">
                <option value="American">American</option>
                <option value="Nepali">Nepali</option>
                <option value="Indian">Indian</option>
                <option value="Chinese">Chinese</option>  
                <option value="Mongolian">Mongolian</option>
                <option value="Urdu">Urdu</option>
                <option value="Korean">Korean</option>
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
                id="publisherName"
                placeholder="Ex.Publisher Name"
                type="text"
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
                id="authorName" name="authorName"
                placeholder="Ex. Author Name"
                type="text"
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
                id="publishedate"
                type="date"
              />
            </div>
          </div>
          <div class="frame-parent54">
            <div class="author-description-wrapper">
              <div class="author-description">Author Description :</div>
            </div>
            <div class="description-of-author-wrapper">
              <textarea class="description-of-author" name="authorDes">
Description of Author</textarea
              >
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
                  type="text"
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
                <input class="frame-input" type="file"  name="PictureContent"/>
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
                <input class="frame-child47" type="file" name="fileContent" />
              </div>
            </div>
          </div>
          <div class="frame-wrapper31">
            <div class="frame-parent61">
              <div class="frame-wrapper32">
                <div class="icons8-home-30-1-parent3" onclick="createBookData();">
                  <img
                    class="icons8-home-30-18"
                    alt=""
                    src="./public/icons8home30-14@2x.png"
                  />

                  <div class="frame-wrapper33">
                    <div class="home-login-wrapper4">
                    <div class="home-login9">Create</div>
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
    </div>
    
    <div id="framePopup2" class="popup-overlay" style="display: none">
    
    <?php include '../phpHandlers/editBook.php'; ?> 
    </div>

    <script src="../myjs/adminHandler.js"></script>
  </body>
</html>
