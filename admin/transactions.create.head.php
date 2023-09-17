<?php
$title = 'شارژ کیف پول';
$_ENV['error'] = '';
$telegramId = mysqli_real_escape_string(DB, $_REQUEST['telegram_id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $query = mysqli_query(DB, "SELECT * FROM `wallets` where `telegram_id`='$telegramId'");
    if (mysqli_num_rows($query) === 0) {
        die('<h1>Wallet not exists!</h1>');
    }
    mysqli_free_result($query);


    $amount = mysqli_real_escape_string(DB, $_REQUEST['amount'] ?? 0);
    if ($amount >= ADD_FUND_MIN) {
        //create sql
        $sql = sprintf(
            "INSERT INTO `transactions` (`telegram_id`, `amount`, `created_at`, `updated_at`) VALUES ('%s', '%s', NOW(), NOW())",
            $telegramId, $amount
        );

        //save to db check
        if (mysqli_query(DB, $sql)) {
            redirect('./admin.php?action=wallets.edit&telegram_id=' . $telegramId);
        } else {
            $_ENV['error'] = mysqli_error(DB);
        }
    } else {
        $_ENV['error'] = 'مبلغ باید بیشتر از حداقل باشد.';
    }
}