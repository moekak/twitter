<?php
require_once(dirname(__FILE__) . "../../service/getInfoFunction.php");

$getInfo = new getInfoFunction();

$postData = $getInfo->getPostData();
