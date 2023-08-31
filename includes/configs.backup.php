<?php
date_default_timezone_set('Asia/Tehran');


const DB_HOST = '';
const DB_USERNAME = '';
const DB_PASSWORD = '';
const DB_DATABASE = '';


const API_TOKEN = '';


const LOGIN_COOKIE = '';
const ENCRYPTION_SALT = '';
const ENCRYPTION_ALGORITHM = 'aes-128-ecb';


const ADMIN_USERNAME = 'admin';
const ADMIN_PASSWORD = 'admin';


const ADMIN_MENU = [
    ['address' => 'admin.php?action=index', 'title' => 'داشبورد', 'icon' => 'house-fill'],
    ['address' => 'admin.php?action=transactions.index', 'title' => 'لیست خریدها', 'icon' => 'file-earmark'],
    ['address' => 'admin.php?action=wallets.index', 'title' => 'فروشندگان', 'icon' => 'people'],
    ['address' => 'admin.php?action=logout', 'title' => 'خروج از مدیریت', 'icon' => 'door-closed'],
];
