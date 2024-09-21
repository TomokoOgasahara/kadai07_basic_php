<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/sample.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<title>Wom-tech 企業口コミ投稿</title>
</head>
<body>

<h1>Wom-tech企業口コミ投稿フォーム</h1>

<form action="write.php" method="post">
    名前（匿名可能）：<input type="text" name="name"><br>
    所属部門：<input type="text" name="depart"><br>
    <br> ①年収：<input type="radio" name="star1" value="1">1
    <input type="radio" name="star1" value="2">2
    <input type="radio" name="star1" value="3">3
    <input type="radio" name="star1" value="4">4
    <input type="radio" name="star1" value="5">5

    <br>②働きやすさ：<input type="radio" name="star2" value="1">1
    <input type="radio" name="star2" value="2">2
    <input type="radio" name="star2" value="3">3
    <input type="radio" name="star2" value="4">4
    <input type="radio" name="star2" value="5">5

    <br>③働きがい：<input type="radio" name="star3" value="1">1
    <input type="radio" name="star3" value="2">2
    <input type="radio" name="star3" value="3">3
    <input type="radio" name="star3" value="4">4
    <input type="radio" name="star3" value="5">5

    <br>備考：<br><textarea name="memo" cols="30" rows="10"></textarea>
    <br><button type ="submit">送信</button>
    <br><form type =""><a href="https://wom-tech.sakura.ne.jp/kadai07_basic_php/read.php">集計結果を見る</form>

</form>
</body>
</html>
