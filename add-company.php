<?php
    include('includes/include.php');
    $cDouane = new character();
    //var_dump($aTravellogs);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Douane admin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <a href="./companies.php" class="button">Back</a><br />&nbsp;
        <form id="add-company-form">
            Company name:<br />
            <input class="may-empty" type="text" name="character_name" /><br /><br />
            Starting Sonuren:<br />
            <input class="may-empty" type="text" name="sonuren_offset" /><br /><br />
            <input name="xf" type="hidden" value="addcompany" />
            <input type="submit" value="Add company" />
        </form>
    </div>
    <script type='text/javascript' src='./scripts/scripts.js'></script>
</body>
</html>
