<?php
$title = 'ایجاد کیف جدید';

$_ENV['error'] = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $telegramId = mysqli_real_escape_string(DB, $_POST['telegram_id'] ?? '');
    $telegramUsername = mysqli_real_escape_string(DB, $_POST['telegram_username'] ?? '');
    $name = mysqli_real_escape_string(DB, $_POST['name'] ?? '');
    $mobile = mysqli_real_escape_string(DB, $_POST['mobile'] ?? '');
    $amount = mysqli_real_escape_string(DB, $_POST['amount'] ?? 0);

    if ($telegramId and $telegramUsername and $name and $amount) {
        //create sql
        $sql = "INSERT INTO `wallets` (`telegram_id`, `telegram_username`, `name`, `mobile`, `amount`, `created_at`, `updated_at`) VALUES ('$telegramId', '$telegramUsername', '$name', '$mobile', '$amount', NOW(), NOW())";

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
