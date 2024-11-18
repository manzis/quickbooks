function addBook() {
    // Get values from the form
    const bookName = document.getElementById('bookName').value;
    const writerName = document.getElementById('writerName').value;
    const description = document.getElementById('description').value;
  
    // Create a new div for the book
    const newBookDiv = document.createElement('div');
    newBookDiv.className = 'author-names-frame';
  
    // Populate the new div with the user input
    newBookDiv.innerHTML = `
      <img class="sirish-ko-phool-1-icon" loading="eager" alt="" src="./public/sirishkophool-1@2x.png"/>
      <div class="author-name">
        <div class="story-book-title">
          <div class="book-cover-frame">
            <h2 class="shirsh-ko-phool">${bookName}</h2>
          </div>
          <div class="author-icons-container">
            <div class="parijat">${writerName}</div>
            <img class="icons8-view-30-1" loading="eager" alt="" src="./public/icons8view30-1@2x.png"/>
          </div>
        </div>
        <div class="language-selection">
          <div class="content-section">
            <div class="nepali">${description}</div>
          </div>
        </div>
      </div>
    `;
  
    // Append the new div to the book list
    document.getElementById('bookList').appendChild(newBookDiv);
  
    // Clear the form fields
    document.getElementById('bookForm').reset();
  }
  