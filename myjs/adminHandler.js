
function initializePopup(frameButtonId, popupId) {
    var frameButton = document.getElementById(frameButtonId);

    if (frameButton) {
        frameButton.addEventListener("click", function () {
            var popup = document.getElementById(popupId);

            if (!popup) return;

            var popupStyle = popup.style;

            if (popupStyle) {
                popupStyle.display = "flex";
                popupStyle.zIndex = 100;
                popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
                popupStyle.alignItems = "center";
                popupStyle.justifyContent = "center";
            }

            popup.removeAttribute("closable");

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
}

// Usage example:
initializePopup("createBook", "framePopup");


function createBookData(){
var bookname = document.getElementById('bookname').value;
var publisherName = document.getElementById('publisherName').value;
var authorName = document.getElementById('authorName').value;
var publishedate = document.getElementById('publishedate').value;
var bookDescription = document.getElementById('bookDescription').value;
var category = document.getElementById('selectLanguage').value;

if (bookname === '' || publisherName === '' || authorName === '' || publishedate === '' || bookDescription === ''|| category == '') {
    alert('Please fill in all required fields');
    return;
}

submitForm();
}

 

function submitForm() {
    var form = document.getElementById('CreateBookForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../phpHandlers/insert_book.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            handleResponse(xhr.responseText);
        } else {
            alert('Error: ' + xhr.status);
        }
    };
    xhr.onerror = function () {
        alert('Network error occurred');
    };
    xhr.send(formData);
}

function handleResponse(response) {
    console.log('Raw response:', response);

    if (!response) {
        alert('Error: Empty response');
        return;
    }

    var parts = response.split('|');
    
    if (parts.length < 2) {
        alert('Error: Invalid response format');
        return;
    }

    var status = parts[0].trim();
    var message = parts[1].trim();

    console.log('Status:', status);
    console.log('Message:', message);

    alert(message);

    if (status === 'success') {
        window.location.href = 'adminPanel.php';
    } else {
        // Handle the case where the book creation failed
    }
}

//  edit and delete books
function editBook(bookId) {
    // Fetch book details via AJAX
    $.ajax({
        type: 'GET',
        url: '../phpHandlers/editBook.php',
        data: { book_id: bookId },
        dataType: 'html',
        success: function (response) {
            // Create a modal or use the existing one
            var editPopup = document.getElementById('framePopup2');

            if (editPopup) {
                // Display the popup
                editPopup.style.display = 'flex';
                editPopup.style.zIndex = 100;
                editPopup.style.backgroundColor = 'rgba(113, 113, 113, 0.3)';
                editPopup.style.alignItems = 'center';
                editPopup.style.justifyContent = 'center';

                // Populate the popup with the HTML response
                editPopup.innerHTML = response;
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
}

function deleteBook(bookId) {

  // show a confirmation dialog and make an AJAX request to delete from the database
    var confirmation = confirm('Are you sure you want to delete this book?');
    if (confirmation) {
        $.ajax({
            type: 'POST',
            url: '../phpHandlers/deleteBook.php',
            data: { book_id: bookId },
            success: function(response) {
                // Handle the response from the server
                handleDeleteResponse(response);
                window.location.reload();
            },
            error: function(error) {
                // Handle the error (e.g., display an error message)
                console.error(error);
            }
        }); 
    }
}

function handleDeleteResponse(response) {
    console.log(response);

    try {
        var data = JSON.parse(response);
        
        if (data.status === 'success') {
            alert('Book deleted successfully');
            // Optionally, update the UI or reload the page
        } else {
            alert('Error in deleting book: ' + data.message);
            // Handle the case where the book deletion failed
        }
    } catch (e) {
        console.error('Error parsing JSON response', e);
        alert('Unexpected error in deleting book');
    }
}








