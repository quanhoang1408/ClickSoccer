<?php
  include 'config.php';
  include 'get_num_of_seats.php';
  include 'get_match_name.php';
  session_start();
  if (isset($_POST['confirm'])){
  $numseats = $_POST['numofseatsorder'];
    if($numseats < 0){
      echo "Invalid amount";
    }
    else{
      $_SESSION['numofseats'] = $numseats;
      header('location:transaction.php');
    }
  }
  if(isset($_POST['cancel'])){
    header('location:main.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  </head>
  <body>
      <nav class="navbar">
        <ul class="nav">
          <li><a href="main.php"><img width="100px" src="./img//Screen Shot 2022-11-09 at 21.51.43.png" alt=""></a></li>
          <li><a href="" style="margin-top: 10px;">Stadium</a></li>
          <li><a href="billinghistory.php" style="margin-top: 10px;">Billing History</a></li>
          <li><a href="balance.php" style="margin-top: 10px;">Balance</a></li>
          <li><a href="logout.php" style="margin-top: 10px;">Log out</a></li>
        </ul>
      </nav>
      <form style="background:white;" action="billing.php" method="POST" >
          <h2 class="textprimary" style="color: red; padding:10px; text-align:center">Match 
              <?php echo(getmatchname($_SESSION['billid'])) ?>
          </h2>
          <h3 style="color: red; text-align:center">Number of seats left :
            <?php
              echo(getnumofseats($_SESSION['billid']));
            ?>
          </h3>
          <h3 style="text-align: center;">How many seats do you want?</h3>
          <input class = "amount" type="number" required name = "numofseatsorder">
          <br> <br>
          <div class="buttonmoney">
              <input class = "btndeposit" type="submit" name="confirm" value="Confirm">
              <input class = "btnwithdraw" type="submit" name="cancel" value="Cancel">
          </div>
      </form>
  </body>
</html>