<?php
include_once "base.php";
$id=$_GET['id'];

$data=$pdo->query("select * from `invoices` where `id`=$id")->fetch();
$number=$data['number'];
$year=explode("-",$data['date'])[0];
$period=$data['period'];

$adata=$pdo->query("select * from `award_numbers` where `year`='$year' && `period`='$period'")->fetchAll();

$awa=["頭","二","三","四","五","六"];
$tmp=0;
echo "號碼:".$number."<br>";
for($i=0;$i<sizeof($adata);$i++){
    switch($adata[$i]['type']){
        case 1:
            if($number==$adata[$i]['number']){
                echo "中特別獎:".$adata[$i]['number'];
                $tmp=1;
            }
            
        break;
        case 2:
            if($number==$adata[$i]['number']){
                echo "中特獎:".$adata[$i]['number'];
                $tmp=1;
            }
        break;
        case 3:
            $res=-1;
            for($j=5;$j>=0;$j--){
                if(mb_substr($number,$j,8-$j)==mb_substr($adata[$i]['number'],$j,8-$j)){
                    $res ="中$awa[$j]獎:".mb_substr($adata[$i]['number'],$j,8-$j);
                    $tmp=1;
                }else{
                break;
                }
            }
            if($res!=-1){
                echo $res;
            }
        break;
        case 4:
            if(mb_substr($number,5,3)==$adata[$i]['number']){
                echo "中增開六獎:".$adata[$i]['number'];
                $tmp=1;
            }
        break;
    }
}
if($tmp==0){
    echo "沒中獎";
}
?>