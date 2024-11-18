$(document).ready(function() {
    $("#signupBtn").click(function() {
        var username = $("#username").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();

        // Simple client-side validation
        if (username === '' || password === '' || confirmPassword === '') {
            alert("Please fill in all fields");
            return;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            return;
        }

        // AJAX request to the PHP file
        $.ajax({
            type: "POST",
            url: "process.php",
            data: { 
                action: "signup",
                username: username, 
                password: password 
            },
            success: function(response) {
                alert(response); // Display the response from the server
            }
        });
    });
});
