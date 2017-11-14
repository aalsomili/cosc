<?php

error_reporting(0);
ini_set('session.gc_maxlifetime', 28800);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
$sessionCookieExpireTime = 28800; // 8hrs
session_set_cookie_params($sessionCookieExpireTime);
session_start();

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/config.php';
require_once 'core/utils.php';
require_once 'database.php';

error_reporting(E_ALL & E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '0');
ini_set('error_log', './');
