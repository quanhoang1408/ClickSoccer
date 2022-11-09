<?php
  include 'config.php';
  include 'get_num_of_seats.php';
  include 'get_match_name.php';
  include 'get_balance.php';
  include 'calculatebill.php';
  session_start();
  if (isset($_POST['pay'])){
    $balance = getbalance($_SESSION['user_id']);
    $bill = calculatebill($_SESSION['numofseats'],$_SESSION['billid']);
    $t = time();
    $date = date("y-m-d",$t);
    $matchname = getmatchname($_SESSION['billid']);
    $numseats = $_SESSION['numofseats'];
    $id = $_SESSION['user_id'];
      if($balance > $bill){
        $insert = "INSERT INTO payment(time,amount,matchname,numberofseats,userid) VALUES('$date','$bill','$matchname','$numseats','$id')";
        mysqli_query($conn,$insert);
        $newbalance = $balance - $bill;
        $update = "UPDATE user_form SET balance = $newbalance WHERE id = {$_SESSION['user_id']}";
        mysqli_query($conn,$update);
        $newnumofseats = getnumofseats($_SESSION['billid']) - $numseats;
        $updateseats = "UPDATE matches SET numofseats = $newnumofseats WHERE id = {$_SESSION['billid']}";
        $result = mysqli_query($conn,$updateseats);
        if($result){
            $message = "you have successfully buy your tickets";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('location:main.php');
        }
      }
      else{
        echo "Your balance is not enough";
      }
    }
    if(isset($_POST['cancel2'])){
        header('location:main.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
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
    <form style="background:white;" action="transaction.php" method="POST" >
        <h2 class="textprimary" style="color: red; padding:10px; text-align:center">Payment</h2>
        <h3 style="color: red; text-align:center">Your total amount:
          <?php
            echo(calculatebill($_SESSION['numofseats'],$_SESSION['billid']));
          ?>
          $
        </h3>
        <br> <br>
        <div class="buttonmoney">
            <input class = "btndeposit" type="submit" name="pay" value="Pay">
            <input class="btnwithdraw" type="submit" name="cancel2" value="Cancel">
        </div>
    </form>
</body>
</html>