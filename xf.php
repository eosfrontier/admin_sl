<?php
    include("./includes/include.php");
    switch($_POST["xf"]){
        case "douaneupdatebyid":
            $cDouane = new character();
            $result = $cDouane->updateById($_POST);
            echo $result;
            break;
        case "addcompany":
            $cDouane = new character();
            $result = $cDouane->addCompany($_POST);
            echo $result;
            break;
        case "transfer":
            $cBank = new bank();
            $result = $cBank->transfer($_POST);
            echo $result;
            //var_dump($result);
            break;
    }

?>
