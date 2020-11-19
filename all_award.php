<?php
include_once "base.php";
$a = ['頭', '二', '三', '四', '五', '六'];
$period_str=[1=>'1,2月',2=>'3,4月',3=>'5,6月',4=>'7,8月',5=>'9,10月',6=>'11,12月'];
echo $_GET['year']."年".$period_str[$_GET['period']]."兌獎<br>";

$award = $pdo->query("select * from award_numbers where year='{$_GET['year']}'&& period='{$_GET['period']}'")->fetchAll();

$special = "";
$grand = "";
$first = [];
$six = [];
$res = 0;
$money=0;
$Aawards=$pdo->query("select * from `invoices` where `period`='{$_GET['period']}' && left(date,4)='{$_GET['year']}' order by `date` desc")->fetchAll();
foreach($Aawards as $Aaward){
    $number=$Aaward['number'];
    for ($i = 0; $i < sizeof($award); $i++) {
        // echo "<li>" . $award[$i]['number'] . "</li>";
        switch ($award[$i]['type']) {
            case 1:
                if ($award[$i]['number'] == $number) {
                    $res = 1;
                    $money=$money+10000000;
                    echo "號碼:" . $number . "中特別獎<br>";
                }
            break;
            case 2:
                if ($award[$i]['number'] == $number) {
                    $res = 1;
                    $money=$money+2000000;
                    echo "號碼:" . $number . "中特獎<br>";
                }
                break;
            case 3:

                $tmp = -1;
                for ($j = 5; $j >= 0; $j--) {
                    $target = mb_substr($award[$i]['number'], $j, (8 - $j), 'utf8');
                    $mynum = mb_substr($number, $j, (8 - $j), 'utf8');

                    if ($target == $mynum) {
                        if($j==5){
                            $money=$money+200;
                        }elseif($j==4){
                            $money=$money+1000;
                        }elseif($j==3){
                            $money=$money+4000;
                        }elseif($j==2){
                            $money=$money+10000;
                        }elseif($j==1){
                            $money=$money+40000;
                        }else{
                            $money=$money+200000;
                        }
                        $res = 1;
                        $tmp = $a[$j];
                        // echo "<br>號碼:" . $mynum . "</br>中" . $a[$j] . "獎";
                    } else {
                        break;
                    }
                }
                if ($tmp != -1)
                    echo "號碼:" .$number . "中" . $tmp . "獎<br>";
                break;
            case 4:
                if ($award[$i]['number'] == mb_substr($number, 5, 3, 'utf8')) {
                    $res = 1;
                    echo "號碼:" . $number . "中增開六獎<br>";
                    $money=$money+200;
                }
                break;
        }
    }
 
}
   if ($res == 0) {
        echo '沒中';
    }
    echo "中了:".$money."元";

?>