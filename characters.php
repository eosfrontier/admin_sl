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
            <H1>Douane Character Editor - Overview</H1>
            <?php
            $factionFilter = !empty($_GET['faction']) ? $_GET['faction'] : "all";
            $npc = !empty($_GET['npc']) ? $_GET['npc'] : "yes";
            $active = !empty($_GET['active']) ? $_GET['active'] : "all";

            ?>
            <!-- <select name="active" id="active" onchange="location.href = '/admin_sl/characters.php?faction=<?php echo $factionFilter; ?>&npc=<?php echo $npc; ?>&active=' + this.value; ">
                <option value="all" <?php if ($active === 'all') echo 'selected' ?>>Show Active & Inactive Players</option>
                <option value="only" <?php if ($active === 'only') echo 'selected' ?>>Show ONLY Active Players</option>
                <option value="no" <?php if ($active === 'no') echo 'selected' ?>>Show ONLY Inactive Players</option>
            </select> -->
            <table border="2">
                <thead>
                    <tr>
                        <th>Portrait</th>
                        <th>Name</th>
                        <th>
                            <select name="faction" id="faction" onchange="location.href = '/admin_sl/characters.php?npc=<?php echo $npc; ?>&active=<?php echo $active; ?>&faction=' + this.value; ">
                                <option value="all" <?php if ($factionFilter === 'all') echo 'selected' ?>>All Factions</option>
                                <option value="aquila" <?php if ($factionFilter === 'aquila') echo 'selected' ?>>Aquila</option>
                                <option value="dugo" <?php if ($factionFilter === 'dugo') echo 'selected' ?>>Dugo</option>
                                <option value="ekanesh" <?php if ($factionFilter === 'ekanesh') echo 'selected' ?>>Ekanesh</option>
                                <option value="pendzal" <?php if ($factionFilter === 'pendzal') echo 'selected' ?>>Pendzal</option>
                                <option value="sona" <?php if ($factionFilter === 'sona') echo 'selected' ?>>Sona</option>
                            </select>
                        </th>
                        <th>
                            <select name="npc" id="npc" onchange="location.href = '/admin_sl/characters.php?faction=<?php echo $factionFilter; ?>&active=<?php echo $active; ?>&npc=' + this.value; ">
                                <option value="yes" <?php if ($npc === 'yes') echo 'selected' ?>>Show Player & NPCs</option>
                                <option value="only" <?php if ($npc === 'only') echo 'selected' ?>>Show ONLY NPCs</option>
                                <option value="no" <?php if ($npc === 'no') echo 'selected' ?>>Show ONLY Players</option>
                            </select>
                        </th>
                    </tr>
                </thead>
                <?php
                foreach ($aDouanes as $aDouane) {
                    if (!empty($aDouane["character_name"])) {
                        if ($factionFilter != "all") {
                            if ($aDouane["faction"] != $factionFilter) {
                                continue;
                            }
                        }
                        if ($npc == "no" && substr($aDouane["status"], 0, 4) === "figu") {
                            continue;
                        }
                        if ($npc == "only" && substr($aDouane["status"], 0, 4) != "figu") {
                            continue;
                        }

                        // if (!substr($aDouane["status"], 0, 4) === "figu" && !($aDouane["sheet_status"] === "active")){
                        //     continue;
                        // }
                        // if ($active == "no" && !substr($aDouane["status"], 0, 4) === "figu" && $aDouane["sheet_status"] === "active" ){
                        //     continue;
                        // }
                ?>
                        <tr style="height:100px">
                            <td><a href="character-edit.php?id=<?php echo $aDouane["characterID"]; ?>">
                                    <?php
                                    $status = $aDouane["status"];
                                    if (str_contains($status, "figu")) {
                                        $sImage = "../eos_douane/images/mugs/npc/" . $aDouane["figu_accountID"] . ".jpg";
                                    } else {
                                        $sImage = "../eos_douane/images/mugs/" . $aDouane["characterID"] . ".jpg";
                                    }
                                    if (file_exists($sImage)) {
                                        echo '<img height="100px" src="' . $sImage . '" />';
                                    } else { ?>
                                        <img height="100px" src="../eos_douane/images/pending.png" />
                                    <?php } ?>
                            </td>
                            <td>
                                <h3><a href="character-edit.php?id=<?php echo $aDouane["characterID"]; ?>">
                                        <?php echo $aDouane["character_name"];
                                        // echo '<br>'.$aDouane["sheet_status"];
                                        ?>
                                    </a></h3>
                            </td>
                            <td>
                                <h3><?php echo ucfirst($aDouane["faction"]); ?></h3>
                            </td>
                            <td>
                                <h3><?php
                                    if (substr($aDouane["status"], 0, 4) === "figu") {
                                        echo "NPC";
                                    }
                                    ?></h3>
                            </td>
                        </tr>
                        </a>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>