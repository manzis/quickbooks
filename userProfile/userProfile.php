<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: ../login.html');
    exit();
}

$userid = $_SESSION['user']['id'];

// Database connection parameters
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

// Prepare the SQL query to fetch user details
$sql = "SELECT full_name, email, created_at FROM users WHERE id = ?";

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userid);

// Execute the query
$stmt->execute();

// Bind result variables
$stmt->bind_result($userFullName, $userEmail, $created_at);

// Fetch the results
if ($stmt->fetch()) {
    // Success, the variables $userFullName, $userEmail, and $created_at are now populated
} else {
    // No user found or an error occurred
    echo "Error fetching user details: " . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
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
            <div class="contact-us5" id="contactus">Contact Us</div>
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
                  <b class="manjish1"><?php echo $userFullName; ?>!</b>
                  <span class="span1">,</span>
                </p>
                
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
              <div class="manjish-upadhaya1"><?php echo $userFullName; ?></div>
            </div>
          </div>
          <div class="frame-parent68">
            <div class="email-address-wrapper">
              <b class="email-address">Email :</b>
            </div>
            <div class="manjishupadhayagmailcom-wrapper">
              <div class="manjishupadhayagmailcom">
              <?php echo $userEmail; ?>
              </div>
            </div>
          </div>
          <div class="frame-parent69">
            <div class="joined-at-wrapper">
              <b class="joined-at">Joined At :</b>
            </div>
            <div class="wrapper2">
              <div class="div6"><?php echo $created_at; ?></div>
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
              id="username"
              placeholder="Ex. Ram"
              type="text"
              value="<?php echo $userFullName?>"
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
              id="useremail"
              placeholder="Ex.hello@gmail.com"
              type="text"
              value="<?php echo $userEmail?>"
            />
          </div>
        </div>
        <div class="frame-wrapper49">
          <button class="save-changes-wrapper" onclick="saveChanges(<?php echo $userid;?>);">
            <div class="save-changes" >Save Changes</div>
          </button>
        </div>
      </div>
    </div>

    <script src="../myjs/eventhandling.js"></script>
  </body>
</html>
