<?php

include_once "base.php";
if(isset($_GET['meg'])){
    echo $_GET['meg'];
}
if (isset($_GET['pd'])) {
    $period = $_GET['pd'];
} else {
    $period = ceil(date("m") / 2);
}

$rows = $pdo->query("select * from `invoices` where `period`='" . $period . "' order by `date` desc")->fetchAll();

?>

<div class='row justify-content-around' style="list-style-type:none;padding:0">
    <li><a href="index.php?do=invoice_list&pd=1">1,2月</a></li>
    <li><a href="index.php?do=invoice_list&pd=2">3,4月</a></li>
    <li><a href="index.php?do=invoice_list&pd=3">5,6月</a></li>
    <li><a href="index.php?do=invoice_list&pd=4">7,8月</a></li>
    <li><a href="index.php?do=invoice_list&pd=5">9,10月</a></li>
    <li><a href="index.php?do=invoice_list&pd=6">11,12月</a></li>
</div>
<div class="container row justify-content-around">
    <div class="border"> 
        <?php
        echo"總發票數: ";
        $con = $pdo->query("select count(period) from `invoices` where `period`='$period'")->fetchColumn();
         echo $con;
        ?>
    </div>
    <div class="border">
    <?php
        echo"總消費金額: ";
        $money = $pdo->query("select sum(payment) from `invoices` where `period`='$period'")->fetchColumn();
         echo $money;
        ?>
    </div>
</div>

<table class="table">
    <tr>
        <td>發票號碼</td>
        <td>消費日期</td>
        <td>金額</td>
        <td>操作</td>
    </tr>
    <?php
    for ($i = 0; $i < sizeof($rows); $i++) {
    ?>
        <tr>
            <td><?= $rows[$i]['code'] . $rows[$i]['number'] ?></td>
            <td><?= $rows[$i]['date'] ?></td>
            <td><?= $rows[$i]['payment'] ?></td>
            <td>
                <a href="?do=edit&id=<?= $rows[$i]["id"] ?>" class="btn btn-secondary">編輯</a>
                <a href="?do=del&id=<?= $rows[$i]["id"] ?>" class="btn btn-secondary">刪除</a>
                <a href="?do=re&id=<?= $rows[$i]["id"] ?>" class="btn btn-secondary">對獎</a>
            </td>
        </tr>

    <?php
    }
    ?>



</table>