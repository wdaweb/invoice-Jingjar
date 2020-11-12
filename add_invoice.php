<?php
// $sdn="mysql:host=localhost;dbname=invoice;charset=utf8";
// $pdo=new PDO($sdn,"root","");
// foreach($_POST as $key=>$value){
//    $tmp[]=$key;
// }
// foreach($_POST as $key=>$value){
//     $tmp2[]=$value;
//  }
// $sql="insetr into `invoices` (`".implode("`,`,$tmp"). "`) values('".implode("','",$value)."')";
// $pdo->exec($sql);
echo "insetr into `invoices` (`".implode("`,`",array_keys($_POST)). "`) values('".implode("','",$_POST)."')";

?>
123