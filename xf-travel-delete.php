<?php
    include("./includes/include.php");

    $cDouane = new douane();
    $result = $cDouane->deleteTravelByPost($_POST);

    //var_dump($result);
    echo $result;
?>
