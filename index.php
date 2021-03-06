<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>統一發票紀錄及對獎系統</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>


    <h3 class="text-center">統一發票兌獎與紀錄</h3>

    <div class="container">
        <div class="col-sm12 col-lg8 d-flex justify-content-between p-3 mx-auto border">
            <?php
            $month = [1 => '1,2月', 2 => '3,4月', 3 => '5,6月', 4 => '7,8月', 5 => '9,10月', 6 => '11,12月'];
            $m = ceil(date('m') / 2);
            ?>
            <div class="text-center"><?= "{$month[$m]}" ?></div>
            <div class="text-center"><a href="?do=invoice_list">當期發票</a></div>
            <div class="text-center"><a href="?do=award_numbers">兌獎</a></div>
            <div class="text-center"><a href="?do=add_awards">輸入獎號</a></div>
            <div class="text-center"><a href="index.php">回首頁</a></div>
        </div>
        <div class="col-sm12 col-lg8 d-flex flex-column justify-content-between p-3 mx-auto border">
            <?php
            if (isset($_GET['do'])) {
                include "{$_GET['do']}.php";
            } else {
                include "main.php";
            }

            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>