<?php

$telegram_id = intval($_REQUEST['telegram_id']);

//make query & get data
$query = mysqli_query(DB, "SELECT * FROM `wallets` WHERE `telegram_id`='$telegram_id'");
// check if exists
if (mysqli_num_rows($query) === 0) {
    die(json_encode([
        "success" => false,
        "balance" => 0,
        "message" => 'Your Telegram ID: ' . $telegram_id
    ]));
}

//fetch the result as an array
$wallet = mysqli_fetch_assoc($query);

//free result from memory
mysqli_free_result($query);


// query to user wallet balance
$query = mysqli_query(DB, "SELECT SUM(`amount`) AS `balance` FROM `transactions` WHERE `telegram_id`='$telegram_id' and `is_paid`=1");

// fetch user balance
$transactions = mysqli_fetch_assoc($query);

// free result from memory
mysqli_free_result($query);

// set user balance
$balance = $transactions['balance'] ?? 0;

// default response
die(json_encode([
    "success" => true,
    "servers" => json_decode($wallet['servers'], true),
    "balance" => $balance,
    "message" => "Welcome, " . ($wallet['name'] ?? '') . "\nYou have " . number_format($balance) . "T in your account"
]));