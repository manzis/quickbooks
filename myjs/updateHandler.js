function updateBook(bookId) {
    var formData = new FormData(document.getElementById('EditBookForm'));
    
    // Append bookId to formData
    formData.append('bookId', bookId);

    $.ajax({
        url: '../phpHandlers/updateBook.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            var responseData = response.split('|');
            if (responseData[0] === 'success') {
                // Handle success
                console.log('Book updated successfully');
                window.location.reload();
            } else {
                // Handle failure
                console.log('Failed to update book');
                window.location.reload();

            }
        },
        error: function() {
            alert('Error: Unable to update book.');
        }
    });
}
