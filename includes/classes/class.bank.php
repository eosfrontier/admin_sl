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
        $from           = $post["from"];
        $recipient      = $post["recepient"];
        $description    = $post["description"];

		$stmt   = db::$conn->prepare(
			'INSERT INTO
			bank_logging (character_id, id_to, amount, description) values (?, ?, ?, ?)'
		);
		$result = $stmt->execute( [ $from, $recipient, $amount, $description ] );

        return "success";
    }

}

?>
