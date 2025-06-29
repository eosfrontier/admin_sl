<?php
    include('includes/include.php');
    $cDouane = new character();
    $aDouanes = $cDouane->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Douane Characters Admin - Overview</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <div class="douane-overview">

            <?php
                foreach($aDouanes as $aDouane){
                    if(!empty($aDouane["character_name"])){
            ?>
            <a href="character-edit.php?id=<?php echo $aDouane["characterID"]; ?>" class="douane-overview-item">
                <?php
                $status = $aDouane["status"];
                if (str_contains($status, "figu")) {
                    $sImage = "../eos_douane/images/mugs/npc/" . $aDouane["figu_accountID"] . ".jpg";
                } else {
                    $sImage = "../eos_douane/images/mugs/" . $aDouane["characterID"] . ".jpg";
                }
                if (file_exists($sImage)) {
                    echo '<img class="portrait" src="' . $sImage . '" />';
                } else { ?>
                    <img  src="../eos_douane/images/pending.png" />
                <?php } ?>
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
