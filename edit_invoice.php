<?php
include_once "base.php";
$sql = "select * from `invoices` where `id`='{$_GET['id']}'";
$inv = $pdo->query($sql)->fetch();
?>
<form action="api/update_invoice.php" method="post">
    <input  type="hidden" name="id" id="" value=<?="{$inv['id']}"?>>
    <div> 日期: <input class="col-5" type="date" name="date" id="" value=<?="{$inv['date']}"?>></div>
    期別: <select name="period" id="">
        <option value="1"<?=($inv['period']==1)?"selected":""?>>1,2</option>
        <option value="2"<?=($inv['period']==2)?"selected":""?>>3,4</option>
        <option value="3"<?=($inv['period']==3)?"selected":""?>>5,6</option>
        <option value="4"<?=($inv['period']==4)?"selected":""?>>7,8</option>
        <option value="5"<?=($inv['period']==5)?"selected":""?>>9,10</option>
        <option value="6"<?=($inv['period']==6)?"selected":""?>>11,12</option>
    </select>月
    <div>發票號碼:
        <input class="col-2" type="text" name="code" value=<?="{$inv['code']}"?>>
        <input class="col-4" type="number" name="number" value=<?="{$inv['number']}"?>>
    </div>
    <div>
        發票金額: <input class="col-5" type="number" name="payment" value=<?="{$inv['payment']}"?>>
    </div>
    <div>
        <input type="submit" value="確認修改">
    </div>

</form>