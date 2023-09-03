<?php

$title = 'لیست خریدهای کاربر';

$_ENV['error'] = '';

$telegramId = mysqli_real_escape_string(DB, $_GET['telegram_id'] ?? 0);

//make query & get data
$query = mysqli_query(DB, "SELECT * FROM `transactions` where `telegram_id`='$telegramId'");

// check for exists
if (mysqli_num_rows($query) === 0) {
    die('<h1>Wallet not exists!</h1>');
}
//fetch the result as an array
$transactions = mysqli_fetch_all($query, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($query);


//write query for database
$sql = "SELECT * FROM wallets where `telegram_id`='$telegramId'";

//make query & get data
$query = mysqli_query(DB, $sql);

//fetch the result as an array
$user = mysqli_fetch_assoc($query);

//free result from memory
mysqli_free_result($query);

//edit transactions amount
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldTelegramId = $telegramId;
    $telegramId = mysqli_real_escape_string(DB, $_GET['telegram_id'] ?? '');
    $amount = mysqli_real_escape_string(DB, $_POST['amount'] ?? 0);
    echo  $telegramId . "te" . $amount ;
    if ($telegramId and $amount) {
        //create sql
        $sql = sprintf(
            "INSERT INTO `transactions` (`telegram_id`, `amount`, `created_at`, `updated_at`) VALUES ( '%s', '%s', NOW(), NOW())",
            $telegramId , $amount
        );

        //save to db check
        if (mysqli_query(DB, $sql)) {
            redirect('./admin.php?action=transactions.edit&telegram_id=' . $telegramId);
        } else {
            $_ENV['error'] = mysqli_error(DB);
        }
    } else {
        $_ENV['error'] = 'تمام فیلدها ضروری هستند!';
    }
}
