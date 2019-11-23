<?php
class db {
    public static $conn;
}

  db::$conn = new PDO('mysql:host=127.0.0.1;dbname=dev2;charset=utf8mb4', 'rolf', 'TrySlamLeaf42');
?>
