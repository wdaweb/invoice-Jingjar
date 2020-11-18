<?php
include "base.php";

$inv_id = $_GET['id'];
// echo "selelct * from `invoices` where `id`='$inv_id'";
$invoice = $pdo->query("select * from `invoices` where `id`='$inv_id'")->fetch();
$number = $invoice['number'];
echo "我的號碼:" . $number . "<br>";
$date = $invoice['date'];
$year = explode("-", $date)[0];
$period = ceil(explode("-", $date)[1] / 2);
// echo "select * from award_numbers where year='$year'&& period='$period'";
$award = $pdo->query("select * from award_numbers where year='$year'&& period='$period'")->fetchAll();
$a = ['頭', '二', '三', '四', '五', '六'];
?>

<div class="list-group">

    <?php
    $res = 0;
    for ($i = 0; $i < sizeof($award); $i++) {
        // echo "<li>" . $award[$i]['number'] . "</li>";
        switch ($award[$i]['type']) {
            case 1:
                if ($award[$i]['number'] == $number) {
                    $res = 1;
                    echo "<br>號碼:" . $number . "</br>中特別獎";
                }
                break;
            case 2:
                if ($award[$i]['number'] == $number) {
                    $res = 1;
                    echo "<br>號碼:" . $number . "</br>中特獎";
                }
                break;
            case 3:

                $tmp = -1;
                for ($j = 5; $j >= 0; $j--) {
                    $target = mb_substr($award[$i]['number'], $j, (8 - $j), 'utf8');
                    $mynum = mb_substr($number, $j, (8 - $j), 'utf8');

                    if ($target == $mynum) {
                        $res = 1;
                        $tmp = $a[$j];
                        // echo "<br>號碼:" . $mynum . "</br>中" . $a[$j] . "獎";
                    } else {
                        break;
                    }
                }
                if ($tmp != -1)
                    echo $number . "中" . $tmp . "獎";
                break;
            case 4:
                if ($award[$i]['number'] == mb_substr($number, 5, 3, 'utf8')) {
                    $res = 1;
                    echo "<br>號碼:" . $number . "</br>中增開六獎";
                }
                break;
        }
    }
    if ($res == 0) {
        echo '沒中';
    }
    ?>
</div>