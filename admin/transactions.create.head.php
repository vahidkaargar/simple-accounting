<?php
   $title = 'شارژ کیف پول';

   $telegramId = mysqli_real_escape_string(DB, $_GET['telegram_id'] ?? 0);

   $amount = mysqli_real_escape_string(DB, $_POST['amount'] ?? 0);

   if ($amount) {
       //create sql
       $sql = sprintf(
           "INSERT INTO `transactions` (`telegram_id`, `amount`, `created_at`, `updated_at`) VALUES ('%s', '%s', NOW(), NOW())",
           $telegramId, $amount
       );

       //save to db check
       if (mysqli_query(DB, $sql)) {
           redirect('./admin.php?action=wallets.edit&telegram_id=' . $telegramId);
       } else {
           echo mysqli_error(DB);
       }
   }
