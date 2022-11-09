<?php
function creatematch($name, $date, $id){
    $element = "
    <form class=\"div-box\"  action=\"main.php\" method=\"POST\" >
      <div class=\"child1\"><p>$date</p></div>
      <div class=\"child2\">
        <p>$name</p>
        <input type=\"submit\" class=\"\" name=\"buy\" value=\"Buy Now\"></input>
        <input type=\"hidden\" name =\"matchid\" value=$id  >
      </div>
    </form>
    ";
    echo $element;
}