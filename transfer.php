<?php
    include('includes/include.php');
    $cBank = new bank();
    $aRecepients = $cBank->getRecepients();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Douane admin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <div class="douane-overview">
            <div class="transfer-success">
                Sonuren is overgemaakt
            </div>
            <form class="transfer-form">
                From:<br />
                <select required="required" name="from" class="recepient-select">

                    <option value="" disabled selected>Select a company or person</option>
                    <optgroup label="Companies">
                        <?php
                            foreach($aRecepients as $aRecepient){
                                if($aRecepient["company"] != 0){
                                    ?>
                                    <option value="<?php echo $aRecepient["characterID"]; ?>">
                                        <?php echo $aRecepient["character_name"]; ?>
                                    </option>
                                    <?php
                                }
                            }
                        ?>
                    </optgroup>
                    <optgroup label="Persons">
                        <?php
                            foreach($aRecepients as $aRecepient){
                                if($aRecepient["company"] == 0){
                                    if(!empty($aRecepient["character_name"])){
                                    ?>
                                    <option value="<?php echo $aRecepient["characterID"]; ?>">
                                        <?php echo $aRecepient["character_name"]; ?>
                                    </option>
                                    <?php
                                    }
                                }
                            }
                        ?>
                    </optgroup>
                </select><br />
                To:<br />
                <select required="required" name="recepient" class="recepient-select">

                    <option value="" disabled selected>Select a company or person</option>
                    <optgroup label="Companies">
                        <?php
                            foreach($aRecepients as $aRecepient){
                                if($aRecepient["company"] != 0){
                                    ?>
                                    <option value="<?php echo $aRecepient["characterID"]; ?>">
                                        <?php echo $aRecepient["character_name"]; ?>
                                    </option>
                                    <?php
                                }
                            }
                        ?>
                    </optgroup>
                    <optgroup label="Persons">
                        <?php
                            foreach($aRecepients as $aRecepient){
                                if($aRecepient["company"] == 0){
                                    if(!empty($aRecepient["character_name"])){
                                    ?>
                                    <option value="<?php echo $aRecepient["characterID"]; ?>">
                                        <?php echo $aRecepient["character_name"]; ?>
                                    </option>
                                    <?php
                                    }
                                }
                            }
                        ?>
                    </optgroup>
                </select><br />
                Amount:<br />
                <input name="amount" min="0" type="number" required="required" class="amount-input" /><br />
                Description:<br />
                <input name="description" type="text" class="amount-input" /><br />
                <input name="xf" type="hidden" value="transfer" />
                <input type="submit" value="Transfer" class="submit-input" />

            </form>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.recepient-select').select2();
    });
    </script>
    <script type='text/javascript' src='./scripts/scripts.js'></script>
</body>
</html>
