<?php
include_once "base.php";
if (isset($_GET['pd'])) {
    $year = explode("-", $_GET['pd'])[0];
    $period = explode("-", $_GET['pd'])[1];
} else {
    $newest = $pdo->query("select * from `award_numbers` order by `year` desc,`period` desc limit 1")->fetch();
    $year = $newest['year'];
    $period = $newest['period'];
}

$awards = $pdo->query("select * from award_numbers where year='$year'&& period='$period'")->fetchAll();
$special = "";
$grand = "";
$first = [];
$six = [];

foreach ($awards as $aw) {
    switch ($aw['type']) {
        case 1:
            $special = $aw['number'];
            break;
        case 2:
            $grand = $aw['number'];
            break;
        case 3:
            $first[] = $aw['number'];
            break;
        case 4:
            $six[] = $aw['number'];
            break;
    }
}
?>
    <div class="row justify-content-around" style="list-style: none;">
        <li ><a href="index.php?do=award_numbers&pd=2020-1">1,2月</a></li>
        <li ><a href="index.php?do=award_numbers&pd=2020-2">3,4月</a></li>
        <li ><a href="index.php?do=award_numbers&pd=2020-3">5,6月</a></li>
        <li ><a href="index.php?do=award_numbers&pd=2020-4">7,8月</a></li>
        <li ><a href="index.php?do=award_numbers&pd=2020-5">9,10月</a></li>
        <li ><a href="index.php?do=award_numbers&pd=2020-6">11,12月</a></li>
    </div>

    <table class="table table-bordered" summary="統一發票中獎號碼單">
        <tbody>
            <tr>
                <th id="months">年月份</th>
                <td headers="months" class="title">
                    年<?= $year ?>期<?= $period ?>

                </td>
            </tr>
            <tr>
                <th id="specialPrize" rowspan="2">特別獎</th>
                <td headers="specialPrize" class="number">
                    <?= $special ?>
                </td>
            </tr>
            <tr>
                <td headers="specialPrize"> 同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元 </td>
            </tr>
            <tr>
                <th id="grandPrize" rowspan="2">特獎</th>
                <td headers="grandPrize" class="number">
                    <?= $grand ?>
                </td>
            </tr>
            <tr>
                <td headers="grandPrize"> 同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元 </td>
            </tr>
            <tr>
                <th id="firstPrize" rowspan="2">頭獎</th>
                <td headers="firstPrize" class="number">
                    <?php
                    foreach ($first as $f) {
                        echo $f . '<br>';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td headers="firstPrize"> 同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元 </td>
            </tr>
            <tr hidden>
                <th id="twoPrize">二獎</th>
                <td headers="twoPrize"> 同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元 </td>
            </tr>
            <tr hidden>
                <th id="threePrize">三獎</th>
                <td headers="threeAwards"> 同期統一發票收執聯末6 位數號碼與頭獎中獎號碼末6 位相同者各得獎金1萬元 </td>
            </tr>
            <tr hidden>
                <th id="fourPrize">四獎</th>
                <td headers="fourPrizes"> 同期統一發票收執聯末5 位數號碼與頭獎中獎號碼末5 位相同者各得獎金4千元 </td>
            </tr>
            <tr hidden>
                <th id="fivePrize">五獎</th>
                <td headers="fivePrize"> 同期統一發票收執聯末4 位數號碼與頭獎中獎號碼末4 位相同者各得獎金1千元 </td>
            </tr>
            <tr hidden>
                <th id="sixPrize">六獎</th>
                <td headers="sixPrize"> 同期統一發票收執聯末3 位數號碼與 頭獎中獎號碼末3 位相同者各得獎金2百元 </td>
            </tr>
            <tr>
                <th id="addSixPrize">增開六獎</th>
                <td headers="addSixPrize" class="number">
                    <?php
                    foreach ($six as $s) {
                        echo $s . '<br>';
                    }
                    ?>
                </td>
            </tr>
</div>
</tbody>
<!-- <div class="text-center">
        <input type="submit" value="送出" class="btn btn-secondary">
        <input type="reset" value="重製" class="btn btn-secondary">
    </div> -->
</table>
 <a href="?do=all_award&year=<?=$year?>&period=<?=$period?>" class="text-light mx-auto"><button class="btn btn-secondary"> 兌獎 </button></a>