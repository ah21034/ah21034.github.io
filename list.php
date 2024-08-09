<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>日本酒一覧</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>日本酒一覧</h1>
    <font size=6>
    <?php
    require_once __DIR__ . '/db_config.php';
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=日本酒;charset=utf8', $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM nihonsyu';
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<table>' . PHP_EOL;
        echo '<tr>' . PHP_EOL;
        echo '<th>名前　</th><th>種類　</th><th>説明</th><th>甘口辛口</th><th>濃淡</th><th>値段</th>' . PHP_EOL;
        echo '</tr>' . PHP_EOL;
        foreach ($result as $row) {
            echo '<tr>' . PHP_EOL;
            echo '<td>' . htmlspecialchars($row['name'], ENT_QUOTES) . '</td>' . PHP_EOL;
            echo '<td>' . htmlspecialchars($row['type'], ENT_QUOTES) . '</td>' . PHP_EOL;
            echo '<td>' . nl2br(htmlspecialchars($row['explanation'], ENT_QUOTES) . '</td>' . PHP_EOL);
            echo '<td>' .
                match ($row['spiciness']) {
                    '1' => '辛口',
                    '2' => 'やや辛口',
                    '3' => '普通',
                    '4' => 'やや甘口',
                    '5' => '甘口',
                }
                . '</td>' . PHP_EOL;
            echo '<td>' .
                match ($row['refreshing']) {
                    '1' => '淡麗',
                    '2' => 'やや淡麗',
                    '3' => '普通',
                    '4' => 'やや濃醇',
                    '5' => '濃醇',
                }
                . '</td>' . PHP_EOL;
            echo '<td>' . htmlspecialchars($row['price'], ENT_QUOTES) . '</td>' . PHP_EOL;
            echo '</tr>' . PHP_EOL;
        }
        echo '</table>' . PHP_EOL;
        $dbh = null;
    } catch (PDOException $e) {
        echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
        exit;
    }
    ?>
    <h3><a href="serch.php">日本酒検索</a></h3>
</body>

</html>
