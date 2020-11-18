<?php
include_once "base.php";

$baseCode=['AA','BB','CC','DD','EE','RR'];

for ($i = 0; $i < 10000; $i++) {

    $code = $baseCode[rand(0,5)];
    $number = str_pad(rand(0,99999999),8,'0',STR_PAD_LEFT);//sprintf("%08d",rand(0,99999999))
    $payment = rand(1,20000); 

    $start=strtotime("2020-01-01");
    $end=strtotime("2020-12-31");
    $date = date("Y-m-d",rand($start,$end));

    $period = ceil(explode("-", $date)[1] / 2);

    $ga=['code'=>$code ,'number'=>$number ,'payment'=>$payment ,'date'=>$date,'period'=>$period];

    $sql = "insert into `invoices` (`"   . implode("`,`", array_keys($ga)) .    "`) values('"   . implode("','", $ga) .   "')";
    $pdo->exec($sql);
}
