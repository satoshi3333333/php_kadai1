<?php
// ファイルからデータを読み込む
$file = fopen("data/data.txt", "r");
$genderCount = [
    "男性" => 0,
    "女性" => 0
];
$ageGroups = [
    "20代" => 0,
    "30代" => 0,
    "40代" => 0,
    "50代" => 0
];
$cheeseCount = [
    "ゴルゴンゾーラ" => 0,
    "チェダー" => 0,
    "カマンベール" => 0
];
$totalEntries = 0;

// 1行ずつ読み込んで集計
while (($line = fgets($file)) !== false) {
    $totalEntries++;
    $fields = explode(",", trim($line)); // データをカンマで分割し、空白を取り除く

    // 性別集計
    $gender = $fields[3] ?? '';
    if (isset($genderCount[$gender])) {
        $genderCount[$gender]++;
    }

    // 年代別集計
    $age = $fields[2] ?? '';
    // 年齢のフォーマットをチェックして正しいキーを使用する
    if (strpos($age, "20") !== false) {
        $ageGroups["20代"]++;
    } elseif (strpos($age, "30") !== false) {
        $ageGroups["30代"]++;
    } elseif (strpos($age, "40") !== false) {
        $ageGroups["40代"]++;
    } elseif (strpos($age, "50") !== false) {
        $ageGroups["50代"]++;
    }

    // チーズの集計
    $cheeses = explode("、", $fields[5] ?? '');
    foreach ($cheeses as $cheese) {
        if (isset($cheeseCount[$cheese])) {
            $cheeseCount[$cheese]++;
        }
    }
}
fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート結果集計</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>アンケート結果集計</h1>

    <h2>性別集計</h2>
    <ul>
        <?php foreach ($genderCount as $gender => $count): ?>
            <li><?= $gender ?>: <?= $count ?>人</li>
        <?php endforeach; ?>
    </ul>

    <h2>年代別集計</h2>
    <ul>
        <?php foreach ($ageGroups as $age => $count): ?>
            <li><?= $age ?>: <?= $count ?>人</li>
        <?php endforeach; ?>
    </ul>

    <h2>チーズ別集計</h2>
    <ul>
        <?php foreach ($cheeseCount as $cheese => $count): ?>
            <li><?= $cheese ?>: <?= $count ?>票</li>
        <?php endforeach; ?>
    </ul>

    <h2>総回答数: <?= $totalEntries ?>件</h2>

    <!-- <a href="home.php">戻る</a> -->
</body>
</html>

<?php
// ファイルからデータを読み込む
$file = fopen("data/data.txt", "r");
$data = [];

// 1行ずつ読み込んで配列に格納
while (($line = fgets($file)) !== false) {
    $data[] = htmlspecialchars($line, ENT_QUOTES, 'UTF-8');
}
fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート結果一覧</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>アンケート結果一覧</h1>
    <ul>
        <?php foreach ($data as $entry): ?>
            <li><?= $entry ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="home.php">戻る</a>
</body>
</html>
