<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script>

    function showError(error, show) {

        // grab the fields by id
        usernameField = document.getElementById('username');
        passwordField = document.getElementById('password');
        
        if (error === "username") {
            if (show) {
                usernameField.style = "animation: shakeX; animation-duration: 0.25s;";
                usernameField.style.borderColor = "red";
                usernameField.placeholder = "Username required";
            } else {
                usernameField.style.borderColor = "";
                usernameField.placeholder = "Username";
            }
        } else if (error === "password") {
            if (show) {
                passwordField.style = "animation: shakeX; animation-duration: 0.25s;";
                passwordField.style.borderColor = "red";
                passwordField.placeholder = "Password required";
            } else {
                passwordField.style.borderColor = "";
                passwordField.placeholder = "Password";
            }
        }
    }

    function validate(e) {

        // debug
        console.log("form submitted");

        // grab the elements by id and get their current value
        username = document.getElementById('username').value;
        password = document.getElementById('password').value;

        if ((username.trim() === "") || (password.trim() === "")) {

            // debug
            console.log("username or password are empty.");

            // prevent the form from submitting
            e.preventDefault();

            // if username is empty show it, else don't
            username === "" ? showError("username", true) : showError("username", false);

            // if password is empty show it, else don't :D
            password === "" ? showError("password", true) : showError("password", false);

            // might need a return type later
            return false;
        } 
        
        //might need a return later
        return true;
    }

</script>

<h1 class="text-center">Login</h1>
<div class="page-contents text-center">
    <form class="text-center" action="" method="post" onsubmit="validate(event)">
        <input type="text" name="username" id="username" placeholder="Username"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <input type="submit" value="Submit" class="btn btn-primary">
        <input type="hidden" name="action" value="login">
    </form>
</div>