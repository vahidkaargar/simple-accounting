<?php
//connect to Database
define("DB", mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE));

//check connection
if (!DB) {
    echo mysqli_connect_error();
}

mysqli_set_charset(DB, "utf8");
mysqli_query(DB, "SET time_zone = '+03:30'");