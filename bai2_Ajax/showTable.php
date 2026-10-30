<?php
$op = $_GET["chon"] ?? "";

if ($op != "") {
    include_once("database.class.php");
    $dao = new Dao("root", "", "udn");

    $sql = "select*from {$op}";
    $header = "DANH SÁCH " . strtoupper($op);
    $dao->table("SELECT * FROM {$op}", $header);
}
