<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$name = $_POST["name"];
$depart = $_POST["depart"];
$star1 = $_POST["star1"];
$star2 = $_POST["star2"];
$star3 = $_POST["star3"];
$memo = $_POST["memo"];
$c = ",";
$str = $name.$c.$depart.$c.$star1.$c.$star2.$c.$star3.$c.$memo;

echo $str;

$file = fopen("data.csv", "a");

fwrite($file, $str. "\n");
fclose($file);

header("Location: index.php");
exit;
?>

<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
</body>
</html>