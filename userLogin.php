<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./adminPanel/admin.css" />
    <link rel="stylesheet" href="./css/home copy.css" />
    <link rel="stylesheet" href="./adminPanel/global.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
    <script src="./myjs/auth.js"></script>
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
            <div class="contact-us4" id="contactUs">Contact Us</div>
          </div>
          <div class="icons8-test-account-60-1-wrapper" id="userprofile">
            <img
              class="icons8-test-account-60-1"
              alt=""
              src="./public/icons8testaccount60-1@2x.png"
            />
          </div>
        </div>
      </header>
      <section class="loginto-label">
        <div class="recipe-book-label1">
          <div class="login-landpage-wrapper1">
            <div class="login-landpage5">
              <div class="logintobutton">
                <div class="search-icon">
                  <h1 class="log-into5">Welcome To</h1>
                </div>
                <div class="our-collection-label">
                  <h1 class="recipe-book12">Quick Books</h1>
                </div>
              </div>
              <div class="search-bar-frame">
                <div class="recipes-that-makes6">
                  Download , Save and Browse your Favouriite Books Online
                </div>
              </div>
              <button class="author-info-frame" id="authorInfoFrame">
                <div class="frame-set">
                  <div class="title-frame">
                    <div class="home-login6">Browse</div>
                  </div>
                </div>
              </button>
            </div>
          </div>
        </div>
      </section>
      <section
        class="icon-search-rectangle"
        data-scroll-to="iconSearchRectangle"
      >
        <div class="frame-frame-frame">
          <div class="search-field">
            <div class="icons-container">
              <img
                class="icons8-search-50-1-1"
                alt=""
                src="./public/icons8search50-1-1@2x.png"
              />

              <div class="line-separator"></div>
            </div>
            <input
              class="type-to-search-text"
              placeholder="Type to search Books...."
              type="text" id="searchInput1"
            />
          </div>
          <div class="frame-parijat"> 
            <h2 class="our-book-collection">Our Book Collection</h2>
          </div>
        
          <div class="author-names-frame-parent">

          <?php include './phpHandlers/homeBookFetch.php'; ?>
            
            </div>
            
          </div>
        </div>
      </section>
    </div>
     <script src="./myjs/eventhandling.js"></script>
     
  </body>
</html>
