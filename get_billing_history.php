<?php
function gethistory($id){
    @include 'config.php';
    $sql = "SELECT * FROM payment WHERE userid = '$id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        return $result;
    }
}