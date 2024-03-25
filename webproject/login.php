<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="loginpage.css">
     <nav>
            <div class="navbar">
                <h1 class="logo"><span></span></h1>
                <ul>
                    <li class="home"><a href="index.html">Home</a></li>
                    <li class="about"><a href="aboutpage.html">About</a></li>
                </ul>
            </div>
        </nav>

</head>
<body style="background-color: rgba(0, 0, 0, 0.507); color:yellow;">
    <center>
    <div  style="margin-top: 250px;" >
        <form action="login.php" method="POST">
            Phone.NO: <input type="text"  name="phone" ><br><br>
    
            Password: <input type="password" name="password"><br><br>
    
          <input type="submit" name="login" value="login"> <br><br>
          
           Don't have an account <a href="register.php">Register</a>
        </form>
    </div>
    </center>
</body>
</html>

<?php
    if(isset($_POST["login"])){
        $phone = $_POST["phone"];
    $password = $_POST["password"];

    include("database.php");
    $sql = "select password FROM authentication where phone_no = $phone";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) >0){
        $row = mysqli_fetch_assoc($result);
        if(strcmp($row["password"], $password) == 0){
            echo "you are logged in";
            session_start();
            $_SESSION["login"] = true;
            header('Location: blog.php');
        }else{
            echo "wrong password";
        }
    }else{
        echo "no user found";
    }
    }
?>
