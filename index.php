<?php
if (!isset($_SESSION)) {
  session_start();
}

$rootPath = dirname(__FILE__);

define('ROOT_PATH', $rootPath);

define('PUBLIC_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);

require_once('connection.php');

if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }
} else {
  $controller = 'pages';
  $action = 'home';
}
require_once('routes.php');
