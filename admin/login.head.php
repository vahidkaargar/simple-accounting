<?php
$title = 'ورود به مدیریت';

$_ENV['login_error'] = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($username === ADMIN_USERNAME and $password === md5(ADMIN_PASSWORD)) {
        setCookies(['username' => $username, 'password' => $password]);
        redirect('./admin.php?action=' . $_REQUEST['redirect'] ?? 'index');
    } else {
        $_ENV['login_error'] = 'نام یا نام کاربری اشتباه است.';
    }
} else {
    // if is login
    if ($isAdmin) {
        redirect('./admin.php?action=index');
    }
}