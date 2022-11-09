<?php
function createbilling($namematch, $date, $numofseats, $amount){
    $element = "
    <div class=\"div-box\">
      <div class=\"child1\"><p>$date</p></div>
      <div class=\"child2\">
        <p>$namematch</p>
        <p>Number of seats: $numofseats </p>
        <p>Amount : $amount $</p>
      </div>
    </div>
    ";
    echo $element;
}