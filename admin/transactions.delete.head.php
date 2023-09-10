<?php
   $title = 'حذف تراکنش';


   $id = mysqli_real_escape_string(DB, $_POST['id'] ?? 0);
   
   $sql = "UPDATE `transactions` SET `is_paid`=0, `updated_at`=NOW() WHERE `id`=$id ";
   
   //save to db check
   if (mysqli_query(DB, $sql)) {
      $operationStatus = "تراکنش موردنظر با موفقیت حذف شد.";
     //redirect('./admin.php?action=transactions.index');
   } else {
      $operationStatus = "عملیات موردنظر انجام نشد.";
      echo mysqli_error(DB);
   }
