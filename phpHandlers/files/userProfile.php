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

    <link rel="stylesheet" href="./userProfile.css" />
    <link rel="stylesheet" href="./global.css" />
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
    <div class="frame-parent62">
      <header class="frame-parent63" id="myHeader" header="head">
        <div class="christmas-2012-new-1771-1-parent2">
          <img
            class="christmas-2012-new-1771-1-icon7"
            alt=""
            src="./public/logo.png"
          />

          <div class="quick-books-container">
            <b class="quick-books5"> Quick Books</b>
          </div>
        </div>
        <div class="frame-parent64">
          <div class="home-container">
            <div class="home9" id="homeProfile">Home</div>
            <div class="contact-us5">Contact Us</div>
          </div>
          <div class="icons8-test-account-60-1-container">
            <img
              class="icons8-test-account-60-11"
              alt=""
              src="./public/account.png"
            />
          </div>
        </div>
      </header>
      <div class="frame-parent65">
        <div class="login-landpage-wrapper3">
          <div class="login-landpage7">
            <div class="login-landpage-inner1">
              <div class="recipe-book-wrapper2">
                <div class="recipe-book14">User Profile</div>
              </div>
            </div>
            <div class="recipes-that-makes-every-food-parent">
              <div class="recipes-that-makes-container1">
                <p class="welcome-manjish1">
                  <span class="welcome1">Welcome </span>
                  <b class="manjish1">Manjish</b>
                  <span class="span1">,</span>
                </p>
                <p class="edit-create-and1">Edit, Create and Save Books.</p>
              </div>
              <div class="icons8-user-96-1-parent">
                <img
                  class="icons8-user-96-1"
                  alt=""
                  src="./public/profile.png"
                />

                <div></div>
              </div>
            </div>
            <div class="login-landpage-inner2">
              <div class="frame-wrapper36">
                <div class="frame-wrapper37">
                  <div class="frame-wrapper38">
                    <button
                      class="icons8-home-30-1-parent5"
                      id="logoutBtn2"
                    >
                      <img
                        class="icons8-home-30-110"
                        alt=""
                        src="./public/icons8home30-13@2x.png"
                      />

                      <div class="frame-wrapper39">
                        <div class="home-login-wrapper6">
                          <div class="home-login11">Log Out</div>
                        </div>
                      </div>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="user-details-parent">
          <b class="user-details">User Details</b>
          <div class="icons8-edit-48-1-wrapper">
            <button class="icons8-edit-48-1" id="editProfile"></button>
          </div>
        </div>
        <div class="frame-parent66">
          <div class="frame-parent67">
            <div class="full-name-wrapper">
              <b class="full-name"> Full Name : </b>
            </div>
            <div class="manjish-upadhaya-wrapper">
              <div class="manjish-upadhaya1">Manjish Upadhaya</div>
            </div>
          </div>
          <div class="frame-parent68">
            <div class="email-address-wrapper">
              <b class="email-address">Email Address :</b>
            </div>
            <div class="manjishupadhayagmailcom-wrapper">
              <div class="manjishupadhayagmailcom">
                manjishupadhaya@gmail.com
              </div>
            </div>
          </div>
          <div class="frame-parent69">
            <div class="joined-at-wrapper">
              <b class="joined-at">Joined At :</b>
            </div>
            <div class="wrapper2">
              <div class="div6">2024-02-30</div>
            </div>
          </div>
        </div>
        <div class="frame-wrapper40">
          <div class="saved-books-wrapper">
            <b class="saved-books">Saved Books</b>
          </div>
        </div>
        <div class="frame-parent70">
          <div class="sirish-ko-phool-1-parent6">
            <img
              class="sirish-ko-phool-1-icon12"
              alt=""
              src="./public/sirishkophool-1@2x.png"
            />

            <div class="frame-parent71">
              <div class="frame-wrapper41">
                <div class="shirsh-ko-phool-parent">
                  <div class="shirsh-ko-phool9">Shirsh ko Phool</div>
                  <img
                    class="icons8-favourite-96-1"
                    alt=""
                    src="./public/icons8favourite96-1@2x.png"
                  />
                </div>
              </div>
              <div class="frame-wrapper42">
                <div class="nepali-wrapper7">
                  <div class="nepali10">Nepali</div>
                </div>
              </div>
            </div>
          </div>
          <div class="sirish-ko-phool-1-parent7">
            <img
              class="sirish-ko-phool-1-icon13"
              alt=""
              src="./public/sirishkophool-1@2x.png"
            />

            <div class="frame-parent72">
              <div class="frame-wrapper43">
                <div class="shirsh-ko-phool-group">
                  <div class="shirsh-ko-phool10">Shirsh ko Phool</div>
                  <img
                    class="icons8-favourite-96-11"
                    alt=""
                    src="./public/icons8favourite96-1@2x.png"
                  />
                </div>
              </div>
              <div class="frame-wrapper44">
                <div class="nepali-wrapper8">
                  <div class="nepali11">Nepali</div>
                </div>
              </div>
            </div>
          </div>
          <div class="sirish-ko-phool-1-parent8">
            <img
              class="sirish-ko-phool-1-icon14"
              alt=""
              src="./public/sirishkophool-1@2x.png"
            />

            <div class="frame-parent73">
              <div class="frame-wrapper45">
                <div class="shirsh-ko-phool-parent1">
                  <div class="shirsh-ko-phool11">Shirsh ko Phool</div>
                  <img
                    class="icons8-favourite-96-12"
                    alt=""
                    src="./public/icons8favourite96-1@2x.png"
                  />
                </div>
              </div>
              <div class="frame-wrapper46">
                <div class="nepali-wrapper9">
                  <div class="nepali12">Nepali</div>
                </div>
              </div>
            </div>
          </div>
          <div class="sirish-ko-phool-1-parent9">
            <img
              class="sirish-ko-phool-1-icon15"
              alt=""
              src="./public/sirishkophool-1@2x.png"
            />

            <div class="frame-parent74">
              <div class="frame-wrapper47">
                <div class="shirsh-ko-phool-parent2">
                  <div class="shirsh-ko-phool12">Shirsh ko Phool</div>
                  <img
                    class="icons8-favourite-96-13"
                    alt=""
                    src="./public/icons8favourite96-1@2x.png"
                  />
                </div>
              </div>
              <div class="frame-wrapper48">
                <div class="nepali-wrapper10">
                  <div class="nepali13">Nepali</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="framePopup" class="popup-overlay" style="display: none">
      <div class="frame-parent75">
        <div class="update-details-wrapper">
          <b class="update-details">Update Details :</b>
        </div>
        <div class="frame-parent76">
          <div class="name-wrapper">
            <div class="name">Name</div>
          </div>
          <div class="ex-john-ram-wrapper">
            <input
              class="ex-john-ram"
              name="bookname"
              id="bookname"
              placeholder="Ex. Shrish ko Phool"
              type="text"
            />
          </div>
        </div>
        <div class="frame-parent77">
          <div class="change-email-wrapper">
            <div class="change-email">Change Email :</div>
          </div>
          <div class="pubilisher-container">
            <input
              class="pubilisher1"
              name="publisher"
              id="publisher"
              placeholder="Ex.Publisher Name"
              type="text"
            />
          </div>
        </div>
        <div class="frame-wrapper49">
          <button class="save-changes-wrapper" id="updateProfile">
            <div class="save-changes">Save Changes</div>
          </button>
        </div>
      </div>
    </div>

    <script src="../myjs/eventhandling.js"></script>
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
