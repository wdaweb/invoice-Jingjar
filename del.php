<?php
include_once "base.php";
if (isset($_GET['del'])) {
    $pdo->exec("delete from `invoices` where `id`='{$_GET['id']}");
    $last3num=1;
    $a=2;
    $b=[1,2];
    header("location:index.php?do=invoice_list");
    // header("location:index.php?do=enterAwards&meg=後三碼：$last3num<br>恭喜中獎！");
} else {
    
    $sql = $pdo->query("select * from `invoices` where `id`='" . $_GET['id'] . "'")->fetch();
?>
    <table class="table">
        <tr>
            <td>號碼</td>
            <td><?= $sql['code'] . $sql['number'] ?></td>
        </tr>
        <tr>
            <td>日期</td>
            <td><?= $sql['date'] ?></td>
        </tr>
        <tr>
            <td>金額</td>
            <td><?= $sql['payment'] ?></td>
        </tr>
        <tr>
            <td><button class="btn btn-secondary"><a href="del.php?del=1&id=<?=$_GET['id']?>">確認</a></button></td>
            <td><button class="btn btn-secondary"><a href="?do=invoice_list">取消</a></button></td>
        </tr>
    </table>
<?php
}
?>