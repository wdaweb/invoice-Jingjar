<?php
include_once "base.php";

$codeArray=["AA","BB","CC","DD","EE"];
for($i=0;$i<10000;$i++){
$code=$codeArray[rand(0,4)];
$number=sprintf("%08d",rand(0,99999999));
$date=date("Y-m-d",rand(strtotime("2020-1-1"),strtotime("2020-12-31")));
$period=ceil(explode("-",$date)[1]/2);
$payment=rand(1,20000);

$invoice=["code"=>$code,"number"=>$number,"date"=>$date,"period"=>$period,"payment"=>$payment];
$sql="insert into `invoices` (`".implode("`,`",array_keys($invoice))."`) values('".implode("','",$invoice)."')";
// echo $sql;
$pdo->exec($sql);
}

?>
