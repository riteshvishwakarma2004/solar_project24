<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
     body {
    background-image: url(profilebg.jpg);
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color:white;
    font-weight:bold;
}

        .navbar {
            height: 50px;
            width: auto;
            display: flex;
            align-items: center;
            backdrop-filter: blur(10px);
            color: blue;
            margin-left: 1300px; 
        }

        .logo {
            color: black;
            font-size: 40px;
            padding: 10px;
            padding-right: 250px;
        }

        .logo span {
            color: black;
            border-radius: 5px;
            background-color: orange;
        }

        .navbar ul {
            list-style: none;
            display: flex;
        }

        .navbar li {
            display: flex;
            padding: 10px 30px;
        }

        .navbar li a {
            text-decoration: none;
            font-size: 20px;
            color: white;
            background: transparent;
            padding: 15px;
            transition: border-bottom 0.3s ease, color 0.3s ease, border-radius 0.3s ease;
        }

        .navbar a:hover {
            border-bottom: 1px solid #0c0cdd;
            color: rgb(176, 178, 209);
            border-radius: 12px;
        }

        .container {
    max-width: 700px;
    margin: 50px auto 20px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    background-image: url(prof1.jpg); 
    background-size:cover;
    background-repeat:no-repeat;
}


input[type="text"],
input[type="email"],
input[type="password"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="number"]:focus {
    border-color: #007bff;
}

input[type="submit"] {
    width: 300px; 
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}


        a {
            color: yellow;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="navbar">
      
        <ul>
            <li><a href="index.html">Home</a></li>
        </ul>
    </div>
    <div class="container">
        <form action="register.php" method="POST">
            Name: <input type="text" name="username"><br><br>
            E-mail: <input type="email" name="email"><br><br>
            Password: <input type="password" name="password"><br><br>
            Location: <input type="text" name="location"><br><br>
            Phone.no:  <input type="number" name="phone"><br><br>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>
    <div style="text-align: center; margin-top: 20px;"><a href="login.php">Login Here</a></div>
</body>
</html>

<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $location = $_POST["location"];


    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
   
    $errors = false;

    if(empty($username)) {
        $errors = true;
        $username_error = "Username is required";
    }

    if(empty($email)) {
        $errors = true;
        $email_error = "Email is required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = true;
        $email_error = "Invalid email format";
    }

    if(empty($passwordHash)) {
        $errors = true;
        $password_error = "Password is required";
    } elseif(strlen($password) < 8) {
        $errors = true;
        $password_error = "Password must be at least 8 characters long";
    }

    if(empty($location)) {
        $errors = true;
        $location_error = "Location is required";
    }

    if(empty($phone)) {
        $errors = true;
        $phone_error = "Phone number is required";
    } elseif(strlen($phone) < 10) {
        $errors = true;
        $phone_error = "Invalid phone number";
    }

    if(!$errors) {
        include("database.php");
        $sql = "INSERT INTO solarc (username, password, email, phone_no, location) VALUES ('$username', '$passwordHash', '$email', '$phone', '$location')";
        
        try {
            mysqli_query($conn, $sql);
            echo "You are Registered";
        } catch (mysqli_sql_exception $e) {
            echo "Could not register you";
        }
    }
}
?>