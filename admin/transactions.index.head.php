<?php
$title = 'لیست خریدها';
//write query for database
$sql = "SELECT * FROM transactions ORDER BY created_at";

//make query & get data
$query = mysqli_query(DB, $sql);

//fetch the result as an array
$transactions = mysqli_fetch_all($query, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($query);

//write query for database
$sql = "SELECT * FROM wallets ORDER BY created_at";

//make query & get data
$query = mysqli_query(DB, $sql);

//fetch the result as an array
$users = mysqli_fetch_all($query, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($query);
