<?php

function database_connect(): mysqli
{
    static $db = null;
    if ($db instanceof mysqli) {
        return $db;
    }

    $host = getenv('DB_HOST') ?: 'm6prog_login_db';
    $name = getenv('DB_NAME') ?: 'm6prog_login';
    $user = getenv('DB_USER') ?: 'm6prog_login_app';
    $pass = getenv('DB_PASS') ?: 'm6prog_login_app_pw';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli($host, $user, $pass, $name);
    $db->set_charset('utf8mb4');

    return $db;
}
