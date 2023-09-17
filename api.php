<?php
header("Content-Type: application/json; charset=UTF-8");
include("includes/configs.php");
include("includes/db.php");
include("includes/functions.php");

// check token
checkToken();

// actions
$action = addslashes($_REQUEST['action']) ?? 'index';
$actionFile = "api/{$action}.php";

if (file_exists($actionFile)) {
    require $actionFile;
} else {
    die(json_encode(['success' => false, 'message' => 'Action not exists! (' . $action . ')']));
}
