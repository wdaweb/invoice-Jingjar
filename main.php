<form action="api/add_invoice.php" method="post">
            <div> 日期: <input class="col-5" type="date" name="date" id=""></div>
                期別: <select name="period" id="">
                    <option value="1">1,2</option>
                    <option value="2">3,4</option>
                    <option value="3">5,6</option>
                    <option value="4">7,8</option>
                    <option value="5">9,10</option>
                    <option value="6">11,12</option>
                </select>月
                <div>發票號碼:
                    <input class="col-2" type="text" name="code">
                    <input class="col-4" type="number" name="number">
                </div>
                <div>
                    發票金額: <input class="col-5" type="number" name="payment">
                </div>
                <div>
                <input type="submit" value="送出">
                </div>
        </form>