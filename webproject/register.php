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
       <form action="register.php" method="POST">
        Name: <input type="text" name="username"> <br><br>
        E-mail: <input type="text" name="email"><br><br>
        Password: <input type="text" name="password"><br><br>
        Location: <input type="text" name="location"><br><br>
        Phone.no:  <input type="number" name="phone"><br><br>

        <input type="submit" name="submit" value="register" >
       </form>
    </div>
    </center>

    <div><a href="login.php">login here</a></div>
</body>
</html>

<?php
    
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $location = $_POST["location"];
    

    include("database.php");
    $sql = "INSERT INTO authentication( username,password,email,phone_no,location)
            VALUES ('$username', '$password', '$email' ,'$phone', '$location')";

    try{
        mysqli_query($conn,$sql);
        echo "YOU are Registered";
        
    }catch(mysqli_sql_exception){
        echo "could not register you";
    }
    }

?>