<?php
function getnumofseats($id){
    include 'config.php';
    $select = "SELECT numofseats FROM matches WHERE id = $id";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        return $row['numofseats'];
    }
}