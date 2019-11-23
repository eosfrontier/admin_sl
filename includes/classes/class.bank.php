<?php

class bank{
    public function getRecepients(){
        $stmt = db::$conn->prepare("SELECT character_name, bank, characterID, company FROM ecc_characters WHERE bank = 1 ORDER BY character_name");
		$res = $stmt->execute();
		$res = $stmt->fetchAll();

        return $res;
    }

    public function transfer($post){
        $amount         = $post["amount"];
        $negamount      = "-".$post["amount"];
        $from           = $post["from"];
        $to             = $post["recepient"];
        $description    = $post["description"];

        $sql = "INSERT INTO bank_logging (character_id, id_to, amount, description) values (?, ?, ?, ?)";
        $stmt = db::$conn->prepare($sql);
        $result = $stmt->execute([$from, $to, $negamount, $description]);

        $sql = "INSERT INTO bank_logging (character_id, id_to, amount, description) values (?, ?, ?, ?)";
        $stmt = db::$conn->prepare($sql);
        $result = $stmt->execute([$to, $from, $amount, $description]);

        return "success";
    }

}

?>
