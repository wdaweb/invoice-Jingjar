<?php
include_once "base.php";
$year = $_POST['year'];
$period = $_POST['period'];
$pdo->exec("insert into `award_numbers`(`year`,`period`,`number`,`type`)values('" . $year . "','" . $period . "','" . $_POST['special_prize'] . "','1')");
$pdo->exec("insert into `award_numbers`(`year`,`period`,`number`,`type`)values('" . $year . "','" . $period . "','" . $_POST['grand_prize'] . "','2')");
for ($i = 0; $i < sizeof($_POST['first_prize']); $i++) {
    if (!empty($_POST['first_prize'][$i])) {
        $pdo->exec("insert into `award_numbers`(`year`,`period`,`number`,`type`)values('" . $year . "','" . $period . "','" . $_POST['first_prize'][$i] . "','3')");
    }
}
for ($i = 0; $i < sizeof($_POST['add_six_prize']); $i++) {
    if (!empty($_POST['add_six_prize'][$i])) {
        $pdo->exec("insert into `award_numbers`(`year`,`period`,`number`,`type`)values('" . $year . "','" . $period . "','" . $_POST['add_six_prize'][$i] . "','4')");
    }
}
header("location:index.php?do=award_numbers");
?>