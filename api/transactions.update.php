<?php

$transactionId = mysqli_real_escape_string(DB, $_REQUEST['transaction_id'] ?? 0);
$server = mysqli_real_escape_string(DB, $_REQUEST['server']);
$username = mysqli_real_escape_string(DB, $_REQUEST['username']);


$query = mysqli_query(DB, "SELECT * FROM `transactions` WHERE `id`='$transactionId'");
if (mysqli_num_rows($query) === 0) {
    die(json_encode([
        "success" => false,
        "message" => 'Transaction not found!'
    ]));
}
$transaction = mysqli_fetch_assoc($query);
mysqli_free_result($query);

if (mysqli_query(DB, sprintf("UPDATE `transactions` SET `server`='', `username`='' WHERE `id`='%s'", $transaction['id']))) {
    die(json_encode([
        "success" => true,
        "message" => 'Transaction updated.'
    ]));
} else {
    die(json_encode([
        "success" => false,
        "message" => 'Transaction didnt update!'
    ]));
}

