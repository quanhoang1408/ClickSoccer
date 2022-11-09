<?php
function getmatches(){
    @include 'config.php';
    $sql = "SELECT * FROM matches";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        return $result;
    }
}