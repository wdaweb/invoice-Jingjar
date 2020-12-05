<?php
session_start();
function err($field){
    if(!empty($_SESSION['err'][$field])){
        foreach($_SESSION['err'][$field] as $err){
            echo "<div style='color:red;font-size:12px;'>";
            echo $err;
            echo"</div>";
        }
    }
}
?>
<form action="worng.php" method="post">
    <div>日期:<input style="margin:10px;" type="date" name="date"></div>
    <div> 期別:
        <select style="margin:10px;" name="period">
            <option value="1">1~2</option>
            <option value="2">3~4</option>
            <option value="3">5~6</option>
            <option value="4">7~8</option>
            <option value="5">9~10</option>
            <option value="6">11~12</option>
        </select>
    </div>
    <div>號碼:<input style="display:inline-block;width:50px;margin:10px;" type="text" name="code">
        <input type="number" name="number"> <?php err('number');?>
    </div>
    <div>金額:<input style="margin:10px;" type="number" name="payment"></div>
    <input type="submit" value="送出">

</form>