<?php
    include('includes/include.php');
    $cDouane = new character();
    $sId = $_GET["id"];
    $aDouane = $cDouane->getById($sId);
    $aTravellogs = $cDouane->getTravelLog($aDouane["characterID"]);
    //var_dump($aTravellogs);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Douane Admin - Character Ediit</title>
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
        <button style="padding:2px 5px;" onclick="goBack()">Back</button>

        <script>
        function goBack() {
            window.history.back();
        }
        </script><br />&nbsp;
        <div class="douane-item">
            <form id="douane-update">
	            <div class="douane-image-left">
                <?php
                $sImage = "../eos_douane/images/mugs/".$aDouane["characterID"].".jpg";
                if(file_exists($sImage)){
                ?>
                <img class="douane-image-left" src="../eos_douane/images/mugs/<?php echo $aDouane["characterID"]; ?>.jpg" alt="<?php echo $aDouane["characterID"]; ?>.jpg" /><br />

                <?php }else{ ?>
                <img class="douane-image-left" src="http://via.placeholder.com/500x700" />
                <?php } ?>
                <?php echo $aDouane["characterID"]; ?>.jpg
	            </div>
                <strong>Name:</strong><br />
                <input name="character_name" type="text" value="<?php echo $aDouane["character_name"] ?>" /><br /><br />
                <strong>Rank:</strong><br />
                <input name="rank" type="text" value="<?php echo $aDouane["rank"] ?>" /><br /><br />
                <strong>Card:</strong><br />
                <input name="card_id" type="text" value="<?php echo $aDouane["card_id"] ?>"  /><br /><br />
                <strong>Note:</strong><br />
                <textarea rows="10" cols="50" name="douane_notes"><?php echo $aDouane["douane_notes"] ?></textarea><br /><br /><br /><br />
                <strong>Bank</strong><br />
                <input type="checkbox" name="bank" id="bank-checkbox" value="1" <?php if($aDouane["bank"] == 1){ ?>checked="checked"<?php } ?> /><label for="bank-checkbox"> Can be found in banking list</label><br />&nbsp;<br />
                Sonuren offset <input type="text" name="sonuren_offset" value="<?php echo $aDouane["sonuren_offset"];  ?>" /><br /><br />
                <div class="douane-column">
                    <strong>Factie:</strong><br />
                    <input id="douane-item-faction-aquila" type="radio" name="faction" value="aquila" <?php if($aDouane["faction"] == "aquila"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-aquila">Aquila</label><br />
                    <input id="douane-item-faction-dugo" type="radio" name="faction" value="dugo" <?php if($aDouane["faction"] == "dugo"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-dugo">Dugo</label><br />
                    <input id="douane-item-faction-ekanesh" type="radio" name="faction" value="ekanesh" <?php if($aDouane["faction"] == "ekanesh"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-ekanesh">Ekanesh</label><br />
                    <input id="douane-item-faction-pendzal" type="radio" name="faction" value="pendzal" <?php if($aDouane["faction"] == "pendzal"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-pendzal">Pendzal</label><br />
                    <input id="douane-item-faction-sona" type="radio" name="faction" value="sona" <?php if($aDouane["faction"] == "sona"){ echo "checked='checked'"; } ?> /> <label for="douane-item-faction-sona">Sona</label>
                </div>
                <div class="douane-column">
                    <strong>Originele Factie<font style="color:purple">*</font>:</strong><br />
                    <input id="douane-item-born-faction-aquila" type="radio" name="born_faction" value="" <?php if($aDouane["born_faction"] == ""){ echo "checked='checked'"; } ?> /> <label for="douane-item-born-faction-aquila">Not Set</label><br />
                    <input id="douane-item-born-faction-aquila" type="radio" name="born_faction" value="aquila" <?php if($aDouane["born_faction"] == "aquila"){ echo "checked='checked'"; } ?> /> <label for="douane-item-born-faction-aquila">Aquila</label><br />
                    <input id="douane-item-born-faction-dugo" type="radio" name="born_faction" value="dugo" <?php if($aDouane["born_faction"] == "dugo"){ echo "checked='checked'"; } ?> /> <label for="douane-item-born-faction-dugo">Dugo</label><br />
                    <input id="douane-item-born-faction-ekanesh" type="radio" name="born_faction" value="ekanesh" <?php if($aDouane["born_faction"] == "ekanesh"){ echo "checked='checked'"; } ?> /> <label for="douane-item-born-faction-ekanesh">Ekanesh</label><br />
                    <input id="douane-item-born-faction-pendzal" type="radio" name="born_faction" value="pendzal" <?php if($aDouane["born_faction"] == "pendzal"){ echo "checked='checked'"; } ?> /> <label for="douane-item-born-faction-pendzal">Pendzal</label><br />
                    <input id="douane-item-born-faction-sona" type="radio" name="born_faction" value="sona" <?php if($aDouane["born_faction"] == "sona"){ echo "checked='checked'"; } ?> /> <label for="douane-item-born-faction-sona">Sona</label>
                </div>
                <div class="douane-column">
                    <strong>Disposition:</strong><br />
                    <input id="douane-item-disposition-0" type="radio" name="douane_disposition" value="ACCESS PENDING" <?php if($aDouane["douane_disposition"] == "ACCESS PENDING"){ echo "checked='checked'"; } ?> /> <label for="douane-item-disposition-0">Access pending</label><br />
                    <input id="douane-item-disposition-1" type="radio" name="douane_disposition" value="ACCESS GRANTED" <?php if($aDouane["douane_disposition"] == "ACCESS GRANTED"){ echo "checked='checked'"; } ?> /> <label for="douane-item-disposition-1">Access granted</label><br />
                    <input id="douane-item-disposition-2" type="radio" name="douane_disposition" value="DETAIN" <?php if($aDouane["douane_disposition"] == "DETAIN"){ echo "checked='checked'"; } ?> /> <label for="douane-item-disposition-2">Detain</label><br />
                    <input id="douane-item-disposition-3" type="radio" name="douane_disposition" value="ICC VETTED" <?php if($aDouane["douane_disposition"] == "ICC VETTED"){ echo "checked='checked'"; } ?> /> <label for="douane-item-disposition-3">ICC vetted</label><br />
                    <input id="douane-item-disposition-4" type="radio" name="douane_disposition" value="DECEASED" <?php if($aDouane["douane_disposition"] == "DECEASED"){ echo "checked='checked'"; } ?> /> <label for="douane-item-disposition-4">Deceased</label>
                </div>
                <div class="douane-column">
                    <strong>Threat level:</strong><br />
                    <input id="douane-item-threat-0" type="radio" name="threat_assessment" value="0" <?php if($aDouane["threat_assessment"] == "0"){ echo "checked='checked'"; } ?> /> <label for="douane-item-threat-0">0</label><br />
                    <input id="douane-item-threat-1" type="radio" name="threat_assessment" value="1" <?php if($aDouane["threat_assessment"] == "1"){ echo "checked='checked'"; } ?> /> <label for="douane-item-threat-1">1</label><br />
                    <input id="douane-item-threat-2" type="radio" name="threat_assessment" value="2" <?php if($aDouane["threat_assessment"] == "2"){ echo "checked='checked'"; } ?> /> <label for="douane-item-threat-2">2</label><br />
                    <input id="douane-item-threat-3" type="radio" name="threat_assessment" value="3" <?php if($aDouane["threat_assessment"] == "3"){ echo "checked='checked'"; } ?> /> <label for="douane-item-threat-3">3</label><br />
                    <input id="douane-item-threat-4" type="radio" name="threat_assessment" value="4" <?php if($aDouane["threat_assessment"] == "4"){ echo "checked='checked'"; } ?> /> <label for="douane-item-threat-4">4</label><br />
                    <input id="douane-item-threat-5" type="radio" name="threat_assessment" value="5" <?php if($aDouane["threat_assessment"] == "5"){ echo "checked='checked'"; } ?> /> <label for="douane-item-threat-5">5</label>
                </div>
                <div class="douane-column">
                    <strong>Clearance:</strong><br />
                    <input id="douane-item-clearance-0" type="radio" name="bastion_clearance" value="0" <?php if($aDouane["bastion_clearance"] == "0"){ echo "checked='checked'"; } ?> /> <label for="douane-item-clearance-0">0</label><br />
                    <input id="douane-item-clearance-1" type="radio" name="bastion_clearance" value="1" <?php if($aDouane["bastion_clearance"] == "1"){ echo "checked='checked'"; } ?> /> <label for="douane-item-clearance-1">1</label><br />
                    <input id="douane-item-clearance-2" type="radio" name="bastion_clearance" value="2" <?php if($aDouane["bastion_clearance"] == "2"){ echo "checked='checked'"; } ?> /> <label for="douane-item-clearance-2">2</label><br />
                    <input id="douane-item-clearance-3" type="radio" name="bastion_clearance" value="3" <?php if($aDouane["bastion_clearance"] == "3"){ echo "checked='checked'"; } ?> /> <label for="douane-item-clearance-3">3</label>
                </div>
                <div class="clear"></div>
                <input name="characterID" value="<?php echo $aDouane["characterID"] ?>" type="hidden" />
                <input name="xf" value="douaneupdatebyid" type="hidden" />
                <input type="submit" value="Save" />
                <br />&nbsp;<br />

            </input/>
            <p><font style="color:purple">*</font>Voor gebruik wanneer het personage van factie is veranderd.</p>
            </form>
                </br></br>
            <div>
                <h2>Travel Log</h2>
                <table width="100%">
                    <thead>
                        <td>
                            <strong>Date</strong>
                        </td>
                        <td>
                            <strong>Time</strong>
                        </td>
                        <td>
                            <strong>Access</strong>
                        </td>
                        <td>
                            <strong>Reason</strong>
                        </td>
                        <td>
                            <strong>Note</strong>
                        </td>
                        <td>
                            <strong></strong>
                        </td>
                        <td>
                            <strong></strong>
                        </td>
                    </thead>
                    <?php
                        $i = 0;
                        foreach($aTravellogs as $aTravellog){
                    ?>
                    <form id="travelform<?php echo $i; ?>" class="travellog-row">
                        <tr  id="travelform<?php echo $i; ?>tr">
                            <td>
                                <input name="date" value="<?php echo $aTravellog["date"] ?>" />
                                <input name="id" type="hidden" value="<?php echo $aTravellog["id"] ?>" />
                                <input name="number" type="hidden" value="<?php echo $i ?>" />
                            </td>
                            <td>
                                <input name="time" value="<?php echo $aTravellog["time"] ?>" />
                            </td>
                            <td>
                                <select name="access">
                                    <option <?php if($aTravellog["access"] == 1){ echo 'selected="selected"';} ?> value="1">
                                        Checked in
                                    </option>
                                    <option <?php if($aTravellog["access"] == 0){ echo 'selected="selected"';} ?> value="0">
                                        Checked out
                                    </option>
                                </select>
                            </td>
                            <td>
                                <input name="reason" value="<?php echo $aTravellog["reason"] ?>" />
                            </td>
                            <td>
                                <input name="note" value="<?php echo $aTravellog["note"] ?>" />
                            </td>
                            <td>
                                <button type="button" onclick="submitForm('xf-travel-update.php','#travelform<?php echo $i; ?>')">Update</button>
                            </td>
                            <td>
                                <button type="button" onclick="submitForm('xf-travel-delete.php','#travelform<?php echo $i; ?>')">Delete</button>
                            </td>
                        </tr>
                    </form>
                    <?php $i++; } ?>
                </table>

            </div>
        </div>

    </div>
    <script>

    </script>
    <script type='text/javascript' src='./scripts/scripts.js'></script>
</body>
</html>
