<?php
include_once "base.php";


$data = $pdo->query("select * from `invoices` where left(date,4)='{$_GET['year']}' && `period`='{$_GET['period']}'")->fetchAll();


$adata = $pdo->query("select * from `award_numbers` where `year`='{$_GET['year']}' && `period`='{$_GET['period']}'")->fetchAll();

$awa = ["頭", "二", "三", "四", "五", "六"];
$n=[200000,40000,10000,4000,1000,200];
$tmp = 0;
$money=0;
 echo"<table class='table'>";
foreach ($data as $d) {
    $number = $d['number'];
    $year = explode("-", $d['date'])[0];
    $period = $d['period'];
    // echo "號碼:" . $number . "<br>";
    for ($i = 0; $i < sizeof($adata); $i++) {
       
        switch ($adata[$i]['type']) {
            case 1:
                if ($number == $adata[$i]['number']) {
                    echo "<tr><td>號碼:".$number."<br>";
                    echo "中特別獎:" . $adata[$i]['number']."</td></tr>";
                    $tmp = 1;
                    $money=$money+10000000;
                }

                break;
            case 2:
                if ($number == $adata[$i]['number']) {
                    echo "<tr><td>號碼:".$number."<br>";
                    echo "中特獎:" . $adata[$i]['number']."<br></td></tr>";
                    $tmp = 1;
                    $money=$money+2000000;
                }
                break;
            case 3:
                $res = -1;
                for ($j = 5; $j >= 0; $j--) {
                    if (mb_substr($number, $j, 8 - $j) == mb_substr($adata[$i]['number'], $j, 8 - $j)) {
                     
                        $res = "<tr><td>號碼:".$number."<br>中$awa[$j]獎:" . mb_substr($adata[$i]['number'], $j, 8 - $j)."<br></td></tr>";
                        $tmp = 1;
                        $money=$money+$n[$j];
                    } else {
                        break;
                    }
                }
                if ($res != -1) {
                    echo $res;
                }
                break;
            case 4:
                if (mb_substr($number, 5, 3) == $adata[$i]['number']) {
                    echo "<tr><td>號碼:".$number."<br>";
                    echo "中增開六獎:" . $adata[$i]['number']."<br></td></tr>";
                    $tmp = 1;
                    $money=$money+200;
                }
                break;
        }
        
    }
}
echo"</table>";
echo "<p>中:<span style='color:red;display:inline;'>".$money."</span>元</p>";
if ($tmp == 0) {
    echo "沒中獎";
}
