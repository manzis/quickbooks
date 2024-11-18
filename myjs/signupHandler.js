$(document).ready(function() {
    $("#signupBtn").click(function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Store the current values of the form fields
        var fullName = $("#fullname").val();
        var email = $("#email").val();
        var password = $("#password").val();
        

        // Simple client-side validation
        if (fullName === '' || email === '' || password === '') {
            alert("Please fill in all fields");
          
            return;
        }

        // Validate email format (you can add more complex email validation if needed)
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email)) {

            alert("Invalid email format");
            return;
        }
        
    

// Check if fullname is provided and has at least 2 characters
if (fullName.length < 3) {
    alert("Full name must be at least 3 characters.");
    return;
    
}
const containsNumbers = /\d/;

    if (containsNumbers.test(fullName)) {
        alert("Full name must not contain numbers", "error");
        return;
    }
//password validation 

if (password.length < 8) {
    alert("Password must be at least 8 characters long.");
    
    
    
    return;
}

//term validation
if(!signUpCheck.checked){
    alert("Please Check the box to proceed further");
    // Restore the form fields to their previous values

return;

}
        // AJAX request to the PHP file
        $.ajax({
            type: "POST",
            url: "./phpHandlers/signup.php",
            data: { 
                action: "signup",
                fullName: fullName,
                email: email,
                password: password 
            },
            success: function(response) {
                // Handle the response
                alert(response);

                // Check if sign up was successful
                if (response === "Sign up successful, You can sign in now !"){
                    // Reset form fields
                    $("#fullName, #email, #password").val('');

                    // Alert and navigate to the login page
                    
                    window.location.href = "login.html";
                }
                if (response === "Email address is already registered, Proceed to Login"){
                    // Reset form fields
                    $("#fullName, #email, #password").val('');

                    // Alert and navigate to the login page
                    
                    window.location.href = "login.html";
                }
            }
        });
    })  ;
});
