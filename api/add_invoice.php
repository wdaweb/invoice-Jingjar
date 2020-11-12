<?php
//撰寫新增消費發票的程式碼
//將發票的號碼及相關資訊寫入資料庫

$sdn="mysql:host=localhost;dbname=invoice;charset=utf8";
$pdo=new PDO($sdn,"root"," ");
// foreach($_POST as $key=>$value){
//    $tmp[]=$key;
// }
// foreach($_POST as $key=>$value){
//     $tmp2[]=$value;
//  }
// $sql="insetr into `invoices` (`".implode("`,`,$tmp"). "`) values('".implode("','",$value)."')";
// $pdo->exec($sql);
$sql= "insert into `invoices` (`"   .implode("`,`",array_keys($_POST)).    "`) values('"   .implode("','",$_POST).   "')";
$pdo->exec($sql);
?>

