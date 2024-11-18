
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./bookPage.css" />
    <link rel="stylesheet" href="./global.css" />
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
    
  </head>
  <body>
    <div class="bookviewpage-parent">
      <div class="bookviewpage">
        <header class="frame-parent78" id="myHeader" header="head">
          <div class="christmas-2012-new-1771-1-parent3">
            <img
              class="christmas-2012-new-1771-1-icon8"
              alt=""
              src="./public/logo.png"
            />

            <div class="quick-books-frame">
              <b class="quick-books6"> Quick Books</b>
            </div>
          </div>
          <div class="frame-parent79">
            <div class="home-parent1">
              <div class="home10" id="homePage">Home</div>
              <div class="contact-us6">Contact Us</div>
            </div>
            <div class="icons8-test-account-60-1-frame">
              <img
                class="icons8-test-account-60-12"
                alt="" id="profileIcon"
                src="./public/account.png"
              />
            </div>
          </div>
        </header>
      </div>

      <?php include("book_details.php");?>

      <div id="download" class="popup-overlay" style="display: none">
      <div class="frame-parent848">
        <div class="file-download-successful-wrapper">
          <div class="file-download-successful">File Download Successful</div>
        </div>
        <img
          class="icons8-in-progress-100-1-1"
          alt=""
          src="./public/download.png"
        />
      </div>
    </div>

    <script src="../myjs/eventhandling.js" ></script>
  </body>
</html>
