<?php

require_once(dirname(__FILE__) . "../../service/insertUserInfoFunction.php");

$function = new insertUserInfoFunction();

if($_FILES["icon"]["tmp_name"] == ""){
    header("Location: ./../../view/index.php");
} else if(($_FILES["icon"]["tmp_name"]) && ($_POST["user_id"])){
    $function->insertIcon();

}