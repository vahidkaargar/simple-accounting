<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $telegramId = mysqli_real_escape_string(DB , $_POST['id']);
    $telegramUsername = mysqli_real_escape_string(DB , $_POST['username']);
    $name = mysqli_real_escape_string(DB , $_POST['name']);
    $mobile = mysqli_real_escape_string(DB , $_POST['mobile']);
    $amount = mysqli_real_escape_string(DB , $_POST['amount']);

    //create sql
    $sql = "INSERT INTO wallets(telegram_id,telegram_username,name,mobile,amount) VALUES('$telegramId','$telegramUsername','$name','$mobile','$amount')";

    //save to db check
    if(mysqli_query(DB,$sql)){
      //succes
      redirect('./admin.php?action=index');
    }else{
      //error
      echo "error: " . mysqli_error(DB);
    }
  }
