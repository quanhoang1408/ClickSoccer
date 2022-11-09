<?php

@include 'config.php';
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $balance = $_POST['newbalance'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';
    }else{
        if($pass != $cpass){
            $error[] = 'password not match!';
        }else{
            $insert = "INSERT INTO user_form(name,email,password,balance) VALUES('$name','$email','$pass','$balance')";
            mysqli_query($conn,$insert);
            echo "<script type='text/javascript'>alert('Register successfully');</script>";
            header('location:login_page.php');
        }
    }
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">
      <ul class="nav">
        <li><a href="main.php"><img width="100px" src="./img//Screen Shot 2022-11-09 at 21.51.43.png" alt=""></a></li>
      </ul>
</nav>
<div class="form-container">
    <form class="box" action="register_page.php" method="post"> 
        <h1>REGISTER NOW</h1>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">' .$error. '</span>';
            };
        };
        ?>
        <input type="text" name="name" required placeholder="Enter your name"> 
        <input type="email" name="email" required placeholder="Enter your email">
        <input type="password" name="password" required placeholder="Enter your password"> 
        <input type="password" name="cpassword" required placeholder="Confirm your password">
        <input type="hidden" value='0' name="newbalance">
        <input type="submit" name="submit" value="Register Now" class="form-btn">
        <p style="color:white;">Already have an account? <a style="color: yellow;" href="login_page.php">Login now</a></p> 
     </form> 
</div>

</body>
</html>