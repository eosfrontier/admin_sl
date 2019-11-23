<?php

class douane{
    public function getAll(){
        $stmt = db::$conn->prepare("SELECT * FROM ecc_characters ORDER BY character_name ASC");
		$res = $stmt->execute();
		$res = $stmt->fetchAll();

        return $res;
    }

    public function getById($post){
        $stmt = db::$conn->prepare("SELECT * FROM ecc_characters WHERE characterID = ?");
		$res = $stmt->execute(array($post));
		$res = $stmt->fetch();

        return $res;
    }


}

?>
