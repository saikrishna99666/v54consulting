<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
ob_start();
set_error_handler(function ($errno, $errstr) {
    if ($errno === E_USER_ERROR && strpos($errstr, 'Composer detected issues in your platform') !== false) {
        ob_clean();
        header('HTTP/1.1 200 OK');
        http_response_code(200);
        return true;
    }
    return false;
});

require __DIR__.'/../vendor/autoload.php';

restore_error_handler();
ob_end_clean();

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
