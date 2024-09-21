
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/sample.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.jsを読み込む -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<title>Wom-tech 企業口コミ投稿結果</title>
</head>
<body>

<h1>Wom-tech 企業口コミ投稿結果</h1>

<div class="graph-box">
    <h2 class="graph-title">①年収に対する満足度</h2>
    <canvas id="myBarChart1" width="200" height="200"></canvas>
</div>

<div class="graph-box">
    <h2 class="graph-title">②働きがいに対する満足度</h2>
    <canvas id="myBarChart2" width="200" height="200"></canvas>
</div>

<div class="graph-box">
    <h2 class="graph-title">③働きやすさに対する満足度</h2>
    <canvas id="myBarChart3" width="200" height="200"></canvas>
</div>

</body>    

<?php

// CSVファイルのパスを指定
$csvFilePath = 'data.csv';

// 行数を指定する
$row = 1;

// CSVファイルが存在するか確認
if (file_exists($csvFilePath)) {

    // CSVファイルを読み込みモードで開く
    if (($fileHandle = fopen($csvFilePath, 'r'))  !== FALSE) {

    // テーブルの開始タグ
    echo "<table border='1'>";

    // ヘッダー行を表示する
    echo "<thead><tr><th>名前</th><th>所属部門</th><th>①年収</th><th>②働きやすさ</th><th>③働きがい</th><th>備考</th></tr></thead>";

        // １行ずつ読み込む
        while(($str = fgetcsv($fileHandle))) {
        echo "<tr>";
        $row++;

        // 列に入れる
        foreach ($str as $value) {
        echo "<td>{$value}</td>";
        }
    }
        // テーブルの終了タグ
        echo "</tbody></table>";    

    fclose($fileHandle);
}
}

?>

<script>

//CSVファイルを読み込む関数getCSV()の定義
function getCSV(){
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "data.csv", true); // アクセスするファイルを指定
    req.send(null); // HTTPリクエストの発行
	
    // レスポンスが返ってきたらconvertCSVtoArray()を呼ぶ	
    req.onload = function(){
	convertCSVtoArray(req.responseText); // 渡されるのは読み込んだCSVデータ
    }
}

// 読み込んだCSVデータを二次元配列に変換する関数convertCSVtoArray()の定義
function convertCSVtoArray(str){ // 読み込んだCSVデータが文字列として渡される
    var result = []; // 配列
    var tmp = str.split("\n"); // 改行を区切り文字として行を要素とした配列を生成

    for (var i =0; i < tmp.length; ++i) {
        result[i] = tmp[i].split(',');
    }
    // ３列目の値を取ってきてstar1に入れる
    var star1 =[];
    for (var i = 0; i < result.length; ++i) {
        if(result[i][2]){
            star1.push(result[i][2]);
        }
    }

    // star1の中の数値をカウントするためのオブジェクト
    var count1 = {};
    star1.forEach(function(num){
        if(count1[num]){
            count1[num]++;
        }
        else {
            count1[num] = 1;
        }
   
    });

    var labels1 = Object.keys(count1); // 数値の種類（キー）をラベルに
    var data1 = Object.values(count1); // 出現回数（値）をデータに

    // 4列目の値を取ってきてstar2に入れる
    var star2 =[];
    for (var i = 0; i < result.length; ++i) {
        if(result[i][3]){
            star2.push(result[i][3]);
        }
    }

    // star2の中の数値をカウントするためのオブジェクト
    var count2 = {};
    star2.forEach(function(num){
        if(count2[num]){
            count2[num]++;
        }
        else {
            count2[num] = 1;
        }
   
    });

    var labels2 = Object.keys(count2); // 数値の種類（キー）をラベルに
    var data2 = Object.values(count2); // 出現回数（値）をデータに

    // 5列目の値を取ってきてstar3に入れる
    var star3 =[];
    for (var i = 0; i < result.length; ++i) {
        if(result[i][4]){
            star3.push(result[i][4]);
        }
    }

    // star3の中の数値をカウントするためのオブジェクト
    var count3 = {};
    star3.forEach(function(num){
        if(count3[num]){
            count3[num]++;
        }
        else {
            count3[num] = 1;
        }
   
    });

    var labels3 = Object.keys(count3); // 数値の種類（キー）をラベルに
    var data3 = Object.values(count3); // 出現回数（値）をデータに   

    // グラフを描画する
    createBarChart(labels1, data1, 'myBarChart1');
    createBarChart(labels2, data2, 'myBarChart2');
    createBarChart(labels3, data3, 'myBarChart3');
}

// グラフを描画する関数の定義
function createBarChart(labels, data, canvasId){

    const ctx = document.getElementById(canvasId).getContext('2d');
    new Chart(ctx, {
        type: 'bar', // 棒グラフの指定
        data: {
            labels: labels, // X軸のラベル
            datasets: [{
                data: data, // データセット
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // 背景色
                borderColor: 'rgba(75, 192, 192, 1)', // 枠線の色
                borderWidth: 1 // 枠線の幅
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Y軸が0から始まるように設定
                    ticks: {
                        maxTicksLimit : 10
                    }
                }

                }
            }
        }
    )};

// CSV読み込みを実行
getCSV();


</script>