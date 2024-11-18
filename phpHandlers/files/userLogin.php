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
    <script src="./myjs/auth.js"></script>

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
            <div class="contact-us4">Contact Us</div>
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
              type="text"
            />
          </div>
          <div class="frame-parijat">
            <h2 class="our-book-collection">Our Book Collection</h2>
          </div>
          <div class="author-names-frame-parent">
            <div class="author-names-frame">
              <img
                class="sirish-ko-phool-1-icon"
                loading="eager"
                alt=""
                src="./public/sirishkophool-1@2x.png"
              />

              <div class="author-name">
                <div class="story-book-title">
                  <div class="book-cover-frame">
                    <h2 class="shirsh-ko-phool">Shirsh ko Phool</h2>
                  </div>
                  <div class="author-icons-container">
                    <div class="parijat">Parijat</div>
                    <img
                      class="icons8-view-30-1"
                      loading="eager"
                      alt=""
                      src="./public/icons8view30-1@2x.png"
                    />
                  </div>
                </div>
                <div class="language-selection">
                  <div class="content-section">
                    <div class="nepali">Nepali</div>
                  </div>
                </div>
              </div>
            </div>

            <?php include './phpHandlers/homeBookFetch.php'; ?>


            <div class="author-names-frame2">
              <img
                class="sirish-ko-phool-1-icon2"
                loading="eager"
                alt=""
                src="./public/sirishkophool-1-2@2x.png"
              />

              <div class="frame-parent18">
                <div class="frame-parent19">
                  <div class="intuition-wrapper">
                    <h2 class="intuition">Intuition</h2>
                  </div>
                  <div class="amisha-ghadiali-parent">
                    <div class="amisha-ghadiali">Amisha Ghadiali</div>
                    <img
                      class="icons8-view-30-12"
                      loading="eager"
                      alt=""
                      src="./public/icons8view30-1@2x.png"
                    />
                  </div>
                </div>
                <div class="frame-wrapper12">
                  <div class="american-wrapper">
                    <div class="american">American</div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="author-names-frame3">
              <img
                class="sirish-ko-phool-1-icon3"
                loading="eager"
                alt=""
                src="./public/sirishkophool-1-3@2x.png"
              />

              <div class="frame-parent20">
                <div class="frame-parent21">
                  <div class="alone-a-story-book-wrapper">
                    <h2 class="alone-a">Alone - A Story Book</h2>
                  </div>
                  <div class="amisha-ghadiali-group">
                    <div class="amisha-ghadiali1">Amisha Ghadiali</div>
                    <img
                      class="icons8-view-30-13"
                      loading="eager"
                      alt=""
                      src="./public/icons8view30-1@2x.png"
                    />
                  </div>
                </div>
                <div class="frame-wrapper13">
                  <div class="american-container">
                    <div class="american1">American</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
     <script src="./myjs/eventhandling.js"></script>
  <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
