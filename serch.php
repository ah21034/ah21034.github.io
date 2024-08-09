<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>日本酒の検索</title>
</head>

<body>
    <font size=11>
        <h3>日本酒の検索<br></h3>
        <form method="get" action="serch_output.php">
            名前: <input type="text" name="name">
            <br>
            <input hidden name="spiciness" value="">
            <input type="radio" name="spiciness" value="1"> 辛口
            <input type="radio" name="spiciness" value="2"> やや辛口
            <input type="radio" name="spiciness" value="3"> 普通
            <input type="radio" name="spiciness" value="4"> やや甘口
            <input type="radio" name="spiciness" value="5"> 甘口
            </select>
            <br>
            <input hidden name="refreshing" value="">
            <input type="radio" name="refreshing" value="1">淡麗
            <input type="radio" name="refreshing" value="2"> やや淡麗
            <input type="radio" name="refreshing" value="3"> 普通
            <input type="radio" name="refreshing" value="4"> やや濃醇
            <input type="radio" name="refreshing" value="5"> 濃醇
            <br>
            <input type="submit" value="送信">
            <br>
            <br>
            <h3><a href="list.php">日本酒一覧</a></h3>
            <h3><a href="form.html">日本酒追加</a></h3>
        </form>
</body>

</html>
