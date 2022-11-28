<?php

class character{
    public function getAll(){
        $stmt = db::$conn->prepare("SELECT * FROM ecc_characters WHERE company = 0 AND sheet_status != 'deleted' ORDER BY character_name ASC");
		$res = $stmt->execute();
		$res = $stmt->fetchAll();

        return $res;
    }

    public function getAllCompanies(){
        $stmt = db::$conn->prepare("SELECT * FROM ecc_characters WHERE company = 1 AND sheet_status != 'deleted' ORDER BY character_name ASC");
		$res = $stmt->execute();
		$res = $stmt->fetchAll();

        return $res;
    }

    public function getById($post){
        $stmt = db::$conn->prepare("SELECT * FROM ecc_characters WHERE characterID = ? AND sheet_status != 'deleted'");
		$res = $stmt->execute(array($post));
		$res = $stmt->fetch();

        return $res;
    }

    public function updateById($post){

        $character_name = $_POST["character_name"];
        $characterID = $_POST["characterID"];
        $douane_notes = $_POST["douane_notes"];
        $douane_disposition = $_POST["douane_disposition"];
        $threat_assessment = $_POST["threat_assessment"];
        $faction = $_POST["faction"];
        $born_faction = $_POST["born_faction"];
        $bastion_clearance = $_POST["bastion_clearance"];
        $rank = $_POST["rank"];
	$card_id = $_POST["card_id"];
	$bank = 0;
        if(isset($_POST["bank"])){
            $bank = $_POST["bank"];
        }
        $sonuren_offset = $_POST["sonuren_offset"];

        $sql = "update ecc_characters SET character_name=?, douane_disposition=?, douane_notes=?, threat_assessment=?, faction=?, born_faction=NULLIF(?,''), bastion_clearance=?, rank=?, card_id=?, bank=?, sonuren_offset=? WHERE characterID=?";
        $stmt = db::$conn->prepare($sql);
        $result = $stmt->execute([$character_name, $douane_disposition, $douane_notes, $threat_assessment, $faction, $born_faction, $bastion_clearance, $rank, $card_id, $bank, $sonuren_offset, $characterID]);

        if($result != false){
            return "true";
        }
    }

    public function addCompany($post){
        $character_name = $post["character_name"];
        $sonuren_offset = $post["sonuren_offset"];

        $sql = "INSERT INTO ecc_characters (character_name, sonuren_offset, bank, douane_disposition, faction, company) values (?, ?, 1, 'ICC VETTED', 'aquila', 1)";
        $stmt = db::$conn->prepare($sql);
        $result = $stmt->execute([$character_name, $sonuren_offset]);

        if($result != false){
            return "true";
        }else{
            return $result;
        }
    }

    public function getTravelLog($post){
        $stmt = db::$conn->prepare("SELECT * FROM douane_logging where character_id = ? ORDER BY id DESC");
        $res = $stmt->execute(array($post));
        $res = $stmt->fetchAll();

        return $res;
    }

    public function updateTravelByPost($post){
        $date       = $post["date"];
        $time       = $post["time"];
        $access     = $post["access"];
        $reason     = $post["reason"];
        $note       = $post["note"];
        $id         = $post["id"];
        $number     = $post["number"];

        $sql    = "update douane_logging SET date=?, time=?, access=?, reason=?, note=? WHERE id=?";
        $stmt   = db::$conn->prepare($sql);
        $result = $stmt->execute([$date, $time, $access, $reason, $note, $id]);

        if($result != false){
            $return = array(
                "function" =>  "update",
                "id" =>  "#travelform".$number."tr"
            );

            return json_encode($return);
        }
    }

    public function deleteTravelByPost($post){
        $id         = $post["id"];
        $number     = $post["number"];

        $stmt = db::$conn->prepare("DELETE FROM `douane_logging` WHERE `douane_logging`.`id` = ?");
        $result = $stmt->execute(array($id));

        if($result != false){
            $return = array(
                "function" =>  "delete",
                "id" =>  "#travelform".$number."tr"
            );

            return json_encode($return);
        }

    }

}

?>
