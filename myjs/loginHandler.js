$(document).ready(function() {
    $("#loginBtn").click(function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Store the current values of the form fields
        var email = $("#email").val();
        var password = $("#password").val();

        // Simple client-side validation
        if (email === '' || password === '') {
            alert("Please fill in all fields");
            return;
        }

        // AJAX request to the PHP file
        $.ajax({
            type: "POST",
            url: "./phpHandlers/login.php",
            data: { 
                action: "login",
                email: email,   
                password: password 
            },
            success: function(response) {
                // Handle the response
                alert(response);
                var userFullName=response.fullName;

                // Check if login was successful
                if (response === "Login successful, Redirecting to Homepage") {
                    // Reset form fields
                    $("#email, #password").val('');

                    // Alert and navigate to the logged-in page
                    window.location.href = "userLogin.php";
                }
                if(response == "Welcome Admin, Proceeding To Admin Page"){
                    // Reset form fields
                    $("#email, #password").val('');

                    window.location.href = "./adminPanel/adminPanel.php";
                       
                }
            }
        });
    });
});
