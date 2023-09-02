<?php

$title = 'ویرایش کیف';

$_ENV['error'] = '';

$telegramId = mysqli_real_escape_string(DB, $_GET['telegram_id'] ?? 0);

//make query & get data
$query = mysqli_query(DB, "SELECT * FROM `wallets` where `telegram_id`='$telegramId'");

// check for exists
if (mysqli_num_rows($query) === 0) {
    die('<h1>Wallet not exists!</h1>');
}
//fetch the result as an array
$wallet = mysqli_fetch_assoc($query);

//free result from memory
mysqli_free_result($query);


// get balance
$query = mysqli_query(DB, "SELECT CASE WHEN amount > 0 THEN 'deposit' WHEN amount < 0 THEN 'withdrawal' ELSE 'trash' END AS `amount_category`, SUM(amount) AS `sum_amount` FROM `transactions` WHERE `telegram_id`='$telegramId' GROUP BY `amount_category`");
$transactions = mysqli_fetch_all($query);
<<<<<<< Updated upstream
$balance = [
        'deposit' => 0,
        'withdrawal' => 0
    ];
foreach ($transactions as $transaction){
=======
$balance = [];
foreach ($transactions as $transaction) {
>>>>>>> Stashed changes
    $balance[$transaction[0]] = $transaction[1];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldTelegramId = $telegramId;
    $telegramId = mysqli_real_escape_string(DB, $_POST['telegram_id'] ?? '');
    $telegramUsername = mysqli_real_escape_string(DB, $_POST['telegram_username'] ?? '');
    $name = mysqli_real_escape_string(DB, $_POST['name'] ?? '');
    $mobile = mysqli_real_escape_string(DB, $_POST['mobile'] ?? '');
    $amount = mysqli_real_escape_string(DB, $_POST['amount'] ?? 0);
    $servers = cast($_POST['servers'] ?? '', true);

    if ($telegramId and $telegramUsername and $name and $amount) {
        //create sql
        $sql = sprintf(
            "UPDATE `wallets` SET `telegram_id`='%s', `telegram_username`='%s', `name`='%s', `mobile`='%s', `amount`='%s', `servers`='%s', `updated_at`=NOW() WHERE `telegram_id`='%s'",
            $telegramId, $telegramUsername, $name, $mobile, $amount, $servers, $oldTelegramId
        );

        //save to db check
        if (mysqli_query(DB, $sql)) {
            redirect('./admin.php?action=wallets.edit&telegram_id=' . $telegramId);
        } else {
            $_ENV['error'] = mysqli_error(DB);
        }
    } else {
        $_ENV['error'] = 'تمام فیلدها ضروری هستند!';
    }
}
