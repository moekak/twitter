<?php


$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
$data = json_decode($raw, true); // json形式をphp変数に変換

$res = $data; // やりたい処理

echo json_encode($res);