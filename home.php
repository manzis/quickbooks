<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./css/home copy.css" />
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <div class="home6">
      <header class="f-r-a-m-e">
        <div class="christmas-2012-new-1771-1-container">
          <img
            class="christmas-2012-new-1771-1-icon5"
            loading="eager"
            alt=""
            src="./public/logo.png"
          />

          <div class="quick-books-label3">
            <b class="quick-books3">Quick Books</b>
          </div>
        </div>
        <div class="home-contact-us-login-frame-wrapper">
          <div class="home-contact-us-login-frame2">
            <div class="home7">Home</div>
            <div class="contact-us3" id="contactUsText">Contact Us</div>
            <div class="login11" id="loginText">Login</div>
            <button class="sign-up-button" id="signUpFrame">
              <b class="sign-up3">Sign Up</b>
            </button>
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
              type="text" id="searchInput" 
            />
          </div>
          <div class="frame-parijat">
            <h2 class="our-book-collection">Our Book Collection</h2>
          </div>
          <div class="author-names-frame-parent">
            
            <?php include './phpHandlers/homeBookFetch.php'; ?>

          </div>
        </div>
      </section>
    </div>
    <script src="./myjs/eventhandling.js">
      </script>
  </body>
</html>
