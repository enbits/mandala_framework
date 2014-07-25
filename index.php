<?php

//Includes
ini_set('display_errors', 'on');
define('FULL_PATH', realpath(dirname(__FILE__)));
include(FULL_PATH . '/config.php');
//include(FULL_PATH . '/core/database.php');
include(FULL_PATH . '/core/load.php');
//include(FULL_PATH . '/core/model.php');
include(FULL_PATH . '/core/controller.php');
include(FULL_PATH . '/autoload.php');


//Parse url for bootstraping
$url = '';
if (strpos($_SERVER['QUERY_STRING'], '&') !== false) {
    $url = substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'], '&'));
} else {
    $url = $_SERVER['QUERY_STRING'];
}

$url_data = explode('/', $url);
$controller_name = '';
$action = '';
$params = array();

if (strlen($url_data[0])) {
    $controller_name = $url_data[0];
    $action = count($url_data) > 1 ? $url_data[1] : 'index';
    $params = count($url_data) > 2 ? array_slice($url_data, 2, count($url_data) - 1) : array();
}

if (!load::controller($controller_name)) {
    $controller_name = HOME_PAGE;
    $action = 'index';
    load::controller($controller_name);
}

$controller_name = $controller_name . '_controller';
$controller = new $controller_name;

if (!method_exists($controller, $action)) {
    $action = 'index';
}
//Go!
$controller->output($action, $params);