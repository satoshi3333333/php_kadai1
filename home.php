<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="data.php" method="post">

    <h2>チーズ試食会アンケート</h2>
        お名前: <input type="text" name="username">
        
        ご年齢: <select name="age">
            <option value="20代">20代</option>
            <option value="30代">30代</option>
            <option value="40代">40代</option>
            <option value="50代">50代</option>
        </select>

        性別: <select name="seibetu">
            <option value="男性">男性</option>
            <option value="女性">女性</option>
            
        </select>

        EMAIL: <input type="text" name="mail">

        お気に召したチーズを選択してください:
        <label><input type="checkbox" name="check[]" value="カマンベール">カマンベール</label>
        <label><input type="checkbox" name="check[]" value="ゴルゴンゾーラ">ゴルゴンゾーラ</label>
        <label><input type="checkbox" name="check[]" value="チェダー">チェダー</label>

        <input type="submit" value="送信">
    </form>

</body>

</html>