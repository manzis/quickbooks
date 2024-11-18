// auth.js

$(document).ready(function() {
    // Check authentication using AJAX
    $.ajax({
        type: "POST",
        url: "../phpHandlers/check_auth.php", // Adjust the path accordingly
        dataType: "json",
        success: function(response) {
            if (response.status !== "success") {
                // Redirect to the login page if not authenticated
                window.location.href = "../login.html";
            }
        },
        error: function(error) {
            console.error("Error checking authentication status");
        }
    });

    // Logout function
    function logout() {
        // AJAX request to the PHP file for logout
        $.ajax({
            type: "POST",
            url: "../phpHandlers/logout.php",
            success: function(response) {
                alert(response.message);
                if (response.status === "success") {
                    // Redirect to the login page after logout
                    window.location.href = "../login.html";
                }
            },
            error: function(error) {
                console.error("Error during logout AJAX request");
            }
        });
    }

    // Attach logout function to logout button click event
    $("#logoutBtn").click(logout);
    $("#logoutBtn2").click(logout);

});
