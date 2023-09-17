<?php
$title = 'لیست خریدها';


// generate paginate
$transactionsCount = mysqli_fetch_assoc(mysqli_query(DB, "SELECT COUNT(*) AS total FROM transactions"));
$paginate = paginate($transactionsCount['total']);


//write query for database
$sql = "SELECT t.*, w.telegram_username FROM transactions t INNER JOIN wallets w ON t.telegram_id = w.telegram_id ORDER BY `id` DESC LIMIT {$paginate['per_page']} OFFSET {$paginate['offset']}";

//make query & get data
$query = mysqli_query(DB, $sql);

//fetch the result as an array
$transactions = mysqli_fetch_all($query, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($query);
