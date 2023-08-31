<?php
$title = 'کیف های پول';
//write query for database
$sql = "SELECT * FROM wallets ORDER BY created_at";

//make query & get data
$query = mysqli_query(DB, $sql);

//fetch the result as an array
$users = mysqli_fetch_all($query, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($query);
