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
    echo "<thead><tr><th>名前</th><th>メール</th><th>備考</th></tr></thead>";

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
