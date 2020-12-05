<?php
session_start();
$_SESSION['err']=[];
num('number');
emp('date');
emp('period');
emp('code');
emp('number');
emp('payment');

function num($field){
    if(strlen($_POST[$field])!=8){
        $_SESSION['err'][$field]['len']="長度須為8個數字";
    }
}
function emp($field){
    if(empty($_POST[$field])){
        $_SESSION['err'][$field]['emp']="此欄不得為空";
    }
}

if(!empty($_SESSION['err'])){
    header("location:index.php");
}else{
    header("location:add_invoice_list.php?date={$_POST['date']}&period={$_POST['period']}&code={$_POST['code']}&number={$_POST['number']}&payment={$_POST['payment']}");

    
}
?>