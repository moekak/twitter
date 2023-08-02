<?php
require_once(dirname(__FILE__) . "../../modal/userModel.php");

$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
$data = json_decode($raw, true); // json形式をphp変数に変換

$res = $data; // やりたい処理

session_start();


$name = $res["name"];
$phone = $res["phone"];
$birthday = $res["birthday"];
$password = $res["password"];
date_default_timezone_set('Asia/Tokyo');
$now = date('Y-m-d H:i:s');
$now2 = date('His');
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$login = "@" . $name . $now2;

$check = "";
$id = "";

$model = new userModel();

if($model->checkUserExist($phone)){
    $check = "error";
    $id = "";
    
} else{
    $model->insertUserInfo($name, $phone, $password_hash, $birthday, $now, $login);
    $_SESSION["user_id"] = $model->user_id;
    $check = "success";
    $id = $model->user_id;
}

$data = array(
    "errorCheck" => $check,
    "user_id" => $id
);


echo json_encode($data, true);

