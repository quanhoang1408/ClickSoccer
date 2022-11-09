<?php
 require_once('./php/creatematch.php');
 require_once('./get_matches.php');
 @include 'config.php';
 session_start();
 if(!isset($_SESSION['user_name'])){
  header('location:login_page.php');
 }
 if(isset($_POST['buy'])){
  $_SESSION['billid'] = $_POST['matchid'];
  header('location:billing.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLICK SOCCER!</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body class="bodybackground">
    <nav class="navbar">
      <ul class="nav">
        <li><a href="main.php"><img width="100px" src="./img//Screen Shot 2022-11-09 at 21.51.43.png" alt=""></a></li>
        <li><a href="" style="margin-top: 10px;">Stadium</a></li>
        <li><a href="billinghistory.php" style="margin-top: 10px;">Billing History</a></li>
        <li><a href="balance.php" style="margin-top: 10px;">Balance</a></li>
        <li><a href="logout.php" style="margin-top: 10px;">Log out</a></li>
      </ul>
    </nav>
    <p style="color: white;">Hello, <?php echo $_SESSION['user_name']?></p>
    <div style="background:white;" >
        <h2 class="textprimary" style="color: red; padding:10px; text-align:center">Most Popular Match Right Now</h2>
          <?php
            $result = getmatches();
            while($row = mysqli_fetch_assoc($result)){
              creatematch($row['namematch'],$row['date'],$row['id']);
            }
          ?>
    </div>
</body>
</html>