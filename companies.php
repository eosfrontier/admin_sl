<?php
    include('includes/include.php');
    $cDouane = new character();
    $aDouanes = $cDouane->getAllCompanies();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Douane admin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <a href="./add-company.php">Add a company</a><br  />&nbsp;
        <div class="douane-overview">

            <?php
                foreach($aDouanes as $aDouane){
                    if(!empty($aDouane["character_name"])){
            ?>
            <a href="character-edit.php?id=<?php echo $aDouane["characterID"]; ?>" class="douane-overview-item small">
                <?php echo $aDouane["character_name"]; ?>
            </a>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
