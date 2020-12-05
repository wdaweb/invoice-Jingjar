<?php
include_once "base.php";
$pdo->exec("insert into `invoices`(`" .implode("`,`",array_keys($_GET)). "`)values('" .implode("','",$_GET)."')");
header("location:index.php?do=invoice_list");
?>