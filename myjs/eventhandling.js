

function setupClickListener(elementId, targetUrl) {
    var element = document.getElementById(elementId);
    if (element) {
      element.addEventListener("click", function (e) {
        window.location.href = targetUrl;
      });
    }
  }
setupClickListener("contactUsText", "./contact.html");
setupClickListener("loginText", "./login.html");
setupClickListener("hometext", "./home.php");
setupClickListener("homeroute", "./home.php");
setupClickListener("signUpFrame", "./signup.html");
setupClickListener("recipeBookFrame","./signup.html");
setupClickListener("userprofile", "./userProfile/userProfile.php");
setupClickListener("homeProfile", "../userLogin.php");
setupClickListener("openBook", "./bookPage/bookPage.php");
setupClickListener("homePage", "../userLogin.php");
setupClickListener("profileIcon", "../userProfile/userProfile.php");
setupClickListener("contactus", "../userProfile/contact_us.php");
setupClickListener("contactUs", "./userProfile/contact_us.php");
setupClickListener("profileIco", "userProfile.php");
setupClickListener("goHome","../userLogin.php");

function goBackPrevious(){
  window.history.back();
}


function setupElementHovver(elementId) {
    var element = document.getElementById(elementId);
  
    if (element) {
      // Hover effect
      element.addEventListener("mouseover", function () {
        element.style.backgroundColor = "#f0f0f0"; // Change background color on hover
      });
  
      element.addEventListener("mouseout", function () {
        element.style.backgroundColor = ""; // Reset background color on mouseout
      });
    }
}
  

// Function to setup focus and blur actions for multiple elements
function setupFocusAndBlurActions(elementIds) {
    elementIds.forEach(function(id) {
      var element = document.getElementById(id);
      if (element) {
        // Add 'active' class when the element is focused
        element.addEventListener("focus", function() {
          this.classList.add("active");
        }, true); // Use capture to ensure the event is captured during the capturing phase
  
        // Remove 'active' class when the element loses focus
        element.addEventListener("blur", function() {
          this.classList.remove("active");
        }, true); // Use capture for the same reason
      }
    });
  }
  
  // Call the function with an array of IDs
  document.addEventListener("DOMContentLoaded", function() {
    setupFocusAndBlurActions(["email","password"]);
  });


  var authorInfoFrame = document.getElementById("authorInfoFrame");
      if (authorInfoFrame) {
        authorInfoFrame.addEventListener("click", function () {
          var anchor = document.querySelector(
            "[data-scroll-to='iconSearchRectangle']"
          );
          if (anchor) {
            anchor.scrollIntoView({ block: "start", behavior: "smooth" });
          }
        });
      }



      //handling for UserProfile //
      var icons8Edit481 = document.getElementById("editProfile");
      if (icons8Edit481) {
        icons8Edit481.addEventListener("click", function () {
          var popup = document.getElementById("framePopup");
          if (!popup) return;
          var popupStyle = popup.style;
          if (popupStyle) {
            popupStyle.display = "flex";
            popupStyle.zIndex = 100;
            popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
            popupStyle.alignItems = "center";
            popupStyle.justifyContent = "center";
          }
          popup.setAttribute("closable", "");
      
          var onClick =
            popup.onClick ||
            function (e) {
              if (e.target === popup && popup.hasAttribute("closable")) {
                popupStyle.display = "none";
              }
            };
          popup.addEventListener("click", onClick);
        });
      }

      function viewBook(bookId) {
        // Redirect to the book page based on the book ID
        window.location.href = './bookPage/bookPage.php?book_id=' + bookId;
    }

    //download successful event popup 
    function downloadClick(bookId, userId) {
console.log(userId);
      $.ajax({
          type: "POST",
          url: "../phpHandlers/check_auth.php", // Adjust the path accordingly
          dataType: "json",
          success: function(response) {
              if (response.status !== "success") {
                  // Redirect to the login page if not authenticated
                  window.location.href = "../login.html";
              } else {
                  $.ajax({
                      type: 'GET',
                      url: '../phpHandlers/fetchDownload.php',
                      data: { book_id: bookId },
                      dataType: 'json',
                      success: function(response) {
                          if (response.status === 'success') {
                              // File name retrieved successfully, initiate the download
                              initiateDownload(response.fileName, bookId, userId);
                          } else {
                              alert('Error: ' + response.message);
                          }
                      },
                      error: function(error) {
                          console.error(error);
                          alert('Error occurred while fetching PDF file name');
                      }
                  });
                
  
                  var popup = document.getElementById("download");
                  if (!popup) return;
                  var popupStyle = popup.style;
                  if (popupStyle) {
                      popupStyle.display = "flex";
                      popupStyle.zIndex = 100;
                      popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
                      popupStyle.alignItems = "center";
                      popupStyle.justifyContent = "center";
                  }
                  popup.setAttribute("closable", "");
  
                  var onClick = popup.onClick || function(e) {
                      if (e.target === popup && popup.hasAttribute("closable")) {
                          popupStyle.display = "none";
                      }
                  };
                  popup.addEventListener("click", onClick);
              }
          },
          error: function(error) {
              console.error("Error checking authentication status");
          }
      });
  }
  
  function initiateDownload(fileName, bookId, userId) {
      // Construct the full path to the file
      var filePath = '../phpHandlers/files/' + fileName;
  
      // Create a hidden anchor element
      var downloadLink = document.createElement('a');
      downloadLink.href = filePath;
      downloadLink.download = fileName;
  
      // Append the anchor to the document
      document.body.appendChild(downloadLink);
  
      // Trigger a click event on the anchor
      downloadLink.click();
  
      // Remove the anchor from the document
      document.body.removeChild(downloadLink);
  
      logDownloadAction(userId);
  }
  
  function logDownloadAction(userId) {
    console.log("Download action running");
    $.ajax({
        type: 'POST',
        data : {userId : userId},
        url: '../phpHandlers/logDownload.php', 
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error('Error logging download action');
        }
    });
}

function handleSearch() {
  var searchQuery = this.value.toLowerCase(); // Get the search query entered by the user
  var dishes = document.querySelectorAll('.author-names-frame1'); // Select all dish elements
            
  // Loop through each dish element and hide/display based on search query
  dishes.forEach(function(dish) {
      var dishName = dish.querySelector('.seto-dharti').textContent.toLowerCase(); // Get the dish name
      if (dishName.includes(searchQuery)) {
          dish.style.display = 'block'; // Display the dish if it matches the search query
      } else {
          dish.style.display = 'none'; // Hide the dish if it doesn't match the search query
      }
  });
}



document.getElementById('searchInput').addEventListener('focus', function() {
  this.addEventListener('input', handleSearch);
});

document.getElementById('searchInput').addEventListener('blur', function() {
  this.removeEventListener('input', handleSearch);
});






function saveChanges(userId){
 
  var username = document.getElementById('username').value;
  var useremail = document.getElementById('useremail').value;
  
  if( username === '' || useremail === '')
  {
    alert("please fill in all fields");
    return;
  }
  var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!emailRegex.test(useremail)) {

      alert("Invalid email format");
      return;
  }
$.ajax({

  type: 'POST',
  url : '../phpHandlers/updateProfile.php',
  data : {userId : userId,username : username,
  useremail:useremail},
  success: function(response) {

    alert(response);
    window.location.reload();
   
},
error: function(error) {
    
    console.error(error);
}


});
  

}
    
      
      
    
        
      
    


      
  

      