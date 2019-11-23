<?php
    include('includes/include.php');
    $cDouane = new douane();
    $sId = $_GET["id"];
    $aDouane = $cDouane->getById($sId);
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
        <div class="douane-item">
            <form>
                Naam:<br />
                <input name="character_name" type="text" value="<?php echo $aDouane["character_name"] ?>" /><br /><br />
                Factie:<br />
                <input id="douane-item-faction-aquila" type="radio" name="faction" value="aquila" <?php if($aDouane["faction"] == "aquila"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-aquila">Aquila</label><br />
                <input id="douane-item-faction-dugo" type="radio" name="faction" value="dugo" <?php if($aDouane["faction"] == "dugo"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-dugo">Dugo</label><br />
                <input id="douane-item-faction-ekanesh" type="radio" name="faction" value="ekanesh" <?php if($aDouane["faction"] == "ekanesh"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-ekanesh">Ekanesh</label><br />
                <input id="douane-item-faction-pendzal" type="radio" name="faction" value="pendzal" <?php if($aDouane["faction"] == "pendzal"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-pendzal">Pendzal</label><br />
                <input id="douane-item-faction-sona" type="radio" name="faction" value="sona" <?php if($aDouane["faction"] == "sona"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-sona">Sona</label>
            </form>
        </div>
        <pre>
            <?php var_dump($aDouane); ?>
        </pre>
    </div>
</body>
</html>
