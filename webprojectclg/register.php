<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body style="background-color: rgba(0, 0, 0, 0.623); color:yellow">
    <center>



        <div style="margin-top: 250px;">
            <form action="register.php" method="POST" onsubmit="return validateForm()">
                Name: <input type="text" name="username" id="username"> <br><br>
                E-mail: <input type="text" name="email" id="email"><br><br>
                Password: <input type="password" name="password" id="password"><br><br>
                Location: <input type="text" name="location" id="location"><br><br>
                Phone.no: <input type="text" name="phone" id="phone"><br><br>

                <input type="submit" name="submit" value="register">
            </form>
        </div>

    </center>

    <div><a href="login.php">login here</a></div>


    <script>
        function validateForm() {
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const location = document.getElementById('location').value;
            const phone = document.getElementById('phone').value;

            // Check if fields are empty
            if (username === '' || email === '' || password === '' || location === '' || phone === '') {
                alert('Please fill in all fields');
                return false;
            }

            // Validate email format
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }

            // Validate phone number format
            const phoneRegex = /^\d{10}$/;
            if (!phoneRegex.test(phone)) {
                alert('Please enter a valid 10-digit phone number');
                return false;
            }

            // Validation successful
            return true;
        }
    </script>
</body>

</html>

<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $location = $_POST["location"];


    include("database.php");
    $sql = "INSERT INTO authentication( username,password,email,phone_no,location)
            VALUES ('$username', '$password', '$email' ,'$phone', '$location')";

    try {
        mysqli_query($conn, $sql);
        echo "YOU are Registered";
    } catch (mysqli_sql_exception) {
        echo "could not register you";
    }
}

?>