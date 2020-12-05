<?php
session_start();
$_SESSION['err']=[];
num('number');

function num($field){
    if(strlen($_POST[$field])!=8){
        $_SESSION['err'][$field]['len']="長度須為8個數字";
    }
}
if(!empty($_SESSION['err'])){
    header("location:index.php");
}else{
    header("location:add_invoice_list.php?date={$_POST['date']}&period={$_POST['period']}&code={$_POST['code']}&number={$_POST['number']}&payment={$_POST['payment']}");

    
}
?>