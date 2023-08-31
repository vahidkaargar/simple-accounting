<?php

function getCookies()
{
    $cookie = $_COOKIE[LOGIN_COOKIE] ?? null;
    if (!is_null($cookie)) {
        $cookie = encryption($_COOKIE[LOGIN_COOKIE], true);
        if (isJson($cookie)) {
            return json_decode($cookie, true);
        }
    }
    return null;
}

function setCookies($user, $days = 30)
{
    $user['time'] = time();
    $encrypt = encryption(json_encode($user));
    return setcookie(LOGIN_COOKIE, $encrypt, time() + (86400 * $days), '/');
}

function admin()
{
    $cookieData = getCookies();
    if (!is_null($cookieData)) {
        if ($cookieData['username'] === ADMIN_USERNAME and $cookieData['password'] === md5(ADMIN_PASSWORD)) {
            unset($cookieData['password']);
            return $cookieData;
        }
    }
    return [];
}

function isAdmin()
{
    return !empty(admin());
}

function checkToken()
{
    $token = $_REQUEST['token'] ?? '';
    if ($token !== API_TOKEN) {
        die(json_encode(['success' => false, 'message' => 'Unauthorized token!']));
    }
}

function encryption($string, $decode = false)
{
    if (!$decode) {
        return base64_encode(openssl_encrypt($string, ENCRYPTION_ALGORITHM, ENCRYPTION_SALT, false));
    }
    return openssl_decrypt(base64_decode($string), ENCRYPTION_ALGORITHM, ENCRYPTION_SALT, false);
}

function isJson($string)
{
    return !(json_decode($string) == null);
}

function redirect($url)
{
    header('Location: ' . $url);
    die();
}