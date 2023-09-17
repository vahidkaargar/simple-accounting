<?php

function bgTransactionRow($transaction)
{
    if ($transaction['is_paid']) {
        return ($transaction['amount'] < 0) ? 'bg-light-danger' : 'bg-light-success';
    }
    return 'bg-warning';
}

function paginate($recordsCount, $chunk = 5)
{
    $paginate['per_page'] = PAGINATE_PER_PAGE;
    $paginate['current_page'] = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $paginate['total_pages'] = ceil($recordsCount / $paginate['per_page']);

    $current_chunk = ceil($paginate['current_page'] / $chunk);
    $paginate['start_page'] = ($current_chunk - 1) * $chunk + 1;
    $paginate['end_page'] = min($paginate['start_page'] + $chunk - 1, $paginate['total_pages']);
    $paginate['page_numbers'] = range($paginate['start_page'], $paginate['end_page']);

    $paginate['offset'] = ($paginate['current_page'] - 1) * $paginate['per_page'];

    return $paginate;
}

function cast($data, $toJson = false)
{
    if ($toJson) {
        $dataArray = array_map(function ($item) {
            return trim($item);
        }, explode(',', $data ?? ''));
        return json_encode($dataArray);
    }

    if (is_null($data)) {
        return '';
    }
    $arrayData = json_decode($data, true);
    return implode(', ', $arrayData);
}

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
    if ($token != API_TOKEN) {
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