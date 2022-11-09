<?php

@include 'config.php';
session_start();

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_id'] = $row['id'];
      header('location:main.php');
    }
    else{
      $error[] = 'incorrect email or password';
    }
}
?>


<!DOCTYPE html> 
 <html lang="en" dir="ltr"> 
   <head>
     <meta charset="utf-8"> 
     <title>Login</title> 
     <link rel="stylesheet" href="style.css"> 
   </head> 
   <body>
    <nav class="navbar">
      <ul class="nav">
        <li><a href="main.php"><img width="100px" src="./img//Screen Shot 2022-11-09 at 21.51.43.png" alt=""></a></li>
        <li><a href="" style="margin-top: 10px;">Stadium</a></li>
        <li><a href="billinghistory.php" style="margin-top: 10px;">Billing History</a></li>
        <li><a href="balance.php" style="margin-top: 10px;">Balance</a></li>
      </ul>
    </nav>
    <form class="box" action="login_page.php" method="post"> 
      <h1>Login</h1> 
      <?php
    if(isset($error)){
        foreach($error as $error){
            echo '<span class="error-msg">' .$error. '</span>';
        };
    };
    ?>
    <input type="email" name="email" placeholder="Username"> 
    <input type="password" name="password" placeholder="Password"> 
    <input type="submit" name="submit" value="Login now"> 
    <p style="color:white;">Don't have an account? <a style="color: yellow;" href="register_page.php">Register now</a></p> 
    </form> 
   </body> 
 </html>