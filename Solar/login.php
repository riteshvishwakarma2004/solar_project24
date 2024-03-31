<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">

    <style>
     
body {
    background-image: url(profilebg.jpg);
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color:white;
    font-weight:bold;
}

.container {
    max-width: 500px;
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
    height:300px;
}

form {
    text-align: center;
}

input[type="text"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s ease;
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
    background-color: #45a049;
}

a {
    color: #45a049;
}
.navbar
{
    
    height: 50px;
    width: 30%;
    align-items: center;
    display: flex;
    font-family: 'Kanit', sans-serif;
    backdrop-filter: blur(10px);
    color: blue;
   margin-left: 800px;
}

.logo
{
    color: black ;
    font-size: 40px;
    padding: 10px;
    padding-right: 250px;
}

.logo span
{
    color: black;
    
    border-radius: 5px;
    background-color: orange;
}

.navbar ul 
{
    list-style: none;
    display: flex;
    
    
}

.navbar li
{
    display: flex;
    padding: 10px 30px;
    
}

.navbar li a
{
    
    text-decoration: none;
    font-size: 20px;
    color: white;
    background: transparent;
}
.navbar a{
    padding: 15px;
}

.navbar ul li a:hover{
    border-bottom: 1px solid #0c0cdd;
    color: rgb(176, 178, 209);
    border-radius: 12px;
}

        </style>

</head>
<body >
<header>
        <nav>
            <div class="navbar">
                <h1 class="logo"><span></span></h1>
                <ul>
                    <li class="home"><a href="index.html">Home</a></li>
                    <li class="about"><a href="about.html">About</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <center>
    <div  style="margin-top: 250px;" >
    <div class="container">
        <form action="login.php" method="POST">
            Phone.NO: <input type="text"  name="phone" ><br><br>
    
            Password: <input type="password" name="password"><br><br>
    
          <input type="submit" name="login" value="login"> <br><br>
          
           Don't have an account <a href="register.php">Register</a>
        </form>
    </div>
</div>
    </center>
</body>
</html>

<?php
    if(isset($_POST["login"])){
        $phone = $_POST["phone"];
    $password = $_POST["password"];

    include("database.php");
    $sql = "select password FROM solarc where phone_no = $phone";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) >0){
        $row = mysqli_fetch_assoc($result);
        if(strcmp($row["password"], $password) == 0){
            echo "you are logged in";
            session_start();
            $_SESSION["login"] = true;
            header('Location: blog.html');
        }else{
            echo "wrong password";
        }
    }else{
        echo "no user found";
    }
    }
?>