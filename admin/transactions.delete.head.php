<?php
   $title = 'حذف تراکنش';

$_ENV['message'] = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string(DB, $_POST['id'] ?? 0);
    //save to db check
    if (mysqli_query(DB, "UPDATE `transactions` SET `is_paid`=0, `updated_at`=NOW() WHERE `id`='$id'")) {
        $_ENV['message'] = "تراکنش موردنظر با موفقیت حذف شد.";
        //redirect('./admin.php?action=transactions.index');
    } else {
        $_ENV['message'] = "عملیات موردنظر انجام نشد.";
        echo mysqli_error(DB);
    }
}