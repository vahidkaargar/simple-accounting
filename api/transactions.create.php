<?php

$telegram_id = intval($_REQUEST['telegram_id']);
$server = mysqli_real_escape_string(DB, $_REQUEST['server']);

//make query & get data
$query = mysqli_query(DB, "SELECT `telegram_id`, `amount` FROM `wallets` WHERE `telegram_id`='$telegram_id'");

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

// check for server validation
if (in_array($server, json_decode($wallet['servers'], true))) {
    die(json_encode([
        "success" => false,
        "balance" => 0,
        "message" => 'Please enter a valid server'
    ]));
}

// query to user wallet balance
$query = mysqli_query(DB, "SELECT SUM(`amount`) AS `balance` FROM `transactions` WHERE `telegram_id`='$telegram_id'");

// fetch user balance
$transactions = mysqli_fetch_assoc($query);

// free result from memory
mysqli_free_result($query);


// set user balance
$balance = $transactions['balance'] ?? 0;

// default response
$response = [
    "success" => false,
    "balance" => $balance,
    "message" => ""
];

// check balance if it's enough
if ($wallet['amount'] > $balance) {
    $response['message'] = 'اعتبار حساب شما کافی نیست.';
} else {
    // set account amount
    $amount = -$wallet['amount'];
    if (mysqli_query(DB, "INSERT INTO `transactions` (`telegram_id`, `amount`) VALUES ('$telegram_id', '$amount')")) {
        //success
        $response['success'] = true;
        $response['balance'] = $balance - $amount;
        $response['transaction_id'] = mysqli_insert_id(DB);
        $response['message'] = "مبلغ اکانت از حساب شما برداشت شد.";
    } else {
        //error
        $response['message'] = 'خطا در ارتباط با پایگاه داده...';
    }
}

die(json_encode($response));
