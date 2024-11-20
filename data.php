<?php

$name = $_POST["username"];
$mail = $_POST["mail"];
$age = $_POST["age"];
$seibetu = $_POST["seibetu"];
$c = ",";

if (isset($_POST['check']) && is_array($_POST['check'])) {
    $food = implode("、", $_POST["check"]);
} else {
    $food = "選択なし";
}

$str = date("Y-m-d H:i:s");
$str .= $c . $name . $c . $age . $c . $seibetu . $c . $mail  . $c . $food;


$file = fopen("data/data.txt", "a");
fwrite($file, $str . "\n");
fclose($file);
?>

<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>
    <h2>ご協力ありがとうございました</h2>
    <!-- <?= htmlspecialchars($str, ENT_QUOTES, 'UTF-8') ?>
    <h2>./data/data.txt を確認しましょう！</h2> -->
    <ul>
        <li><a href="home.php">戻る</a></li>
    </ul>
</body>

</html>