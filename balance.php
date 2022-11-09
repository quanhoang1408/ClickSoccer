<?php
    include 'config.php';
    include 'get_balance.php';
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location:login_page.php');
    }
    if (isset($_POST['deposit'])){
        $amount = $_POST['amount'];
        if($amount < 0){
            echo "Invalid amount";
        }
        else{
        $balance = getbalance($_SESSION['user_id']);
        $newbalance = $balance + $amount;
        echo $newbalance;
        $update = "UPDATE user_form SET balance = $newbalance WHERE id = {$_SESSION['user_id']}";
        $result = mysqli_query($conn,$update);
        }
    }
    if (isset($_POST['withdraw'])){
        $amount = $_POST['amount'];
        if($amount < 0){
            echo "Invalid amount";
        }
        else{
            $balance = getbalance($_SESSION['user_id']);
            if($amount > $balance){
                echo "The money is not enough to withdraw";
            }
            else{
                $newbalance = $balance - $amount;
                echo $newbalance;
                $update = "UPDATE user_form SET balance = $newbalance WHERE id = {$_SESSION['user_id']}";
                $result = mysqli_query($conn,$update);
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Balance</title>
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
    <div style="background:white;">
        <h2 style="color: red; padding:10px; text-align:center">Your Balance : <?php echo getbalance($_SESSION['user_id']); ?> $</h2>
        <h2 class="textprimary" style="color: red; padding:10px; text-align:center">Transaction</h2>
        <h3 style="margin-left:43%">Type in the amount of money</h3>
        <form action="balance.php" method="POST">
            <input class="amount" required type="number" name="amount">
            <br> <br> <br>
            <div class="buttonmoney">
                <input class = "btndeposit" type="submit" name="deposit" value="Deposit">
                <input class="btnwithdraw" type="submit" name="withdraw" value="Withdraw">
            </div>
        </form>
    </div>
</body>
</html>