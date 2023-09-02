<?php
$title = 'ایجاد کیف جدید';

$_ENV['error'] = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $telegramId = mysqli_real_escape_string(DB, $_POST['telegram_id'] ?? '');
    $telegramUsername = mysqli_real_escape_string(DB, $_POST['telegram_username'] ?? '');
    $name = mysqli_real_escape_string(DB, $_POST['name'] ?? '');
    $mobile = mysqli_real_escape_string(DB, $_POST['mobile'] ?? '');
    $amount = mysqli_real_escape_string(DB, $_POST['amount'] ?? 0);
    $servers = cast($_POST['servers'] ?? '', true);

    if ($telegramId and $telegramUsername and $name and $amount) {
        //create sql
        $sql = sprintf(
            "INSERT INTO `wallets` (`telegram_id`, `telegram_username`, `name`, `mobile`, `amount`, `servers`, `created_at`, `updated_at`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', NOW(), NOW())",
            $telegramId, $telegramUsername, $name, $mobile, $amount, $servers
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
