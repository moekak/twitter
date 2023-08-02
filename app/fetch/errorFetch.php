<?php

require_once dirname(__FILE__) . "../../../reg/conf.php";

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$timestamp = date("Y-m-d H:i:s");
$errorContent = "json error" .PHP_EOL;
$error = $timestamp . "-"  .$errorContent;
file_put_contents(LOG_FILE_JS, $error, FILE_APPEND);