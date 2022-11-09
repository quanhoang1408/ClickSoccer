<?php
function calculatebill($numofseats,$id){
    include 'config.php';
    $select = "SELECT price_per_seat FROM matches WHERE id = $id";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $priceperseat = $row['price_per_seat'];
    }
    return $priceperseat*$numofseats;
}