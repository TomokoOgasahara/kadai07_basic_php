<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$name = $_POST["name"];
$email = $_POST["email"];
$memo = $_POST["memo"];
$c = ",";
$str = $name.$c.$email.$c.$memo; //aaaa,bbbb,cccc

echo $str;

$file = fopen("data.csv", "a");

fwrite($file, $str."\n");
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