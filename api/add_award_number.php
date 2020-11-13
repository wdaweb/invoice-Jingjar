<?php

//撰寫建立各期中獎號碼的程式
//將表單傳送過來的中獎號碼寫入資料庫
include_once "../base.php";
echo "<pre>";
print_r($_POST);
echo "</pre>";
$year=$_POST['year'];
$period=$_POST['period'];

$sql = "insert into `award_numbers` (`year`,`period`,`number`,`type`) values('$year','$period','{$_POST['special_prize']}','1')";
$pdo->exec($sql);

$sql = "insert into `award_numbers` (`year`,`period`,`number`,`type`) values('$year','$period','{$_POST['special_prize']}','2')";
$pdo->exec($sql);
foreach ($_POST['first_prize'] as $fp) {
    if (!empty($fp)) {
        $sql = "insert into `award_numbers` (`year`,`period`,`number`,`type`) values('$year','$period','$fp','3')";
        $pdo->exec($sql);
    }
}

foreach ($_POST['add_six_prize'] as $six) {
    if (!empty($six)) {
        $sql = "insert into `award_numbers` (`year`,`period`,`number`,`type`) values('$year','$period','$six','4')";
        $pdo->exec($sql);
    }
}



header("location:../index.php?do=award_numbers&pd=".$year."-".$period);
?>
