<?php
   $title = 'شارژ کیف پول';

   $telegramId = mysqli_real_escape_string(DB, $_GET['telegram_id'] ?? 0);

   //make query & get data
   $query = mysqli_query(DB, "SELECT servers FROM `wallets` where `telegram_id`='$telegramId'");

   // check for exists
   if (mysqli_num_rows($query) === 0) {
       die('<h1>Wallet not exists!</h1>');
   }
   //fetch the result as an array
   $wallets = mysqli_fetch_assoc($query);

   //free result from memory
   mysqli_free_result($query);

   $amount = mysqli_real_escape_string(DB, $_POST['amount'] ?? 0);
   echo $wallets['servers'];
   if ($amount) {
       //create sql
       $sql = sprintf(
           "INSERT INTO `transactions` (`telegram_id`, `servers`, `amount`, `created_at`, `updated_at`) VALUES ('%s', '%s', '%s', NOW(), NOW())",
           $telegramId, $wallets['servers'], $amount
       );

       //save to db check
       if (mysqli_query(DB, $sql)) {
           redirect('./admin.php?action=wallets.edit&telegram_id=' . $telegramId);
       } else {
           echo mysqli_error(DB);
       }
   }
