<?php
    session_start();
    include 'config.php';
    include 'get_billing_history.php';
    require_once('./php/createbillinghistory.php');
    if(!isset($_SESSION['user_id'])){
        header('location:login_page.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Billing History</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/Screen Shot 2022-11-09 at 21.51.43.png" class="d-block img-resize" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/anfield.jpeg" class="d-block img-resize" alt="...">
    </div>
    <div class="carousel-item">
      <a href=""><img src="./img/Hang_Day.jpeg" class="d-block img-resize" alt="Hang Day Stadium"></a>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>