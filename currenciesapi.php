<?php
require __DIR__ . "/inc/Header.php";
 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
 
if ((isset($uri[2]) && $uri[2] != 'currencies') || !isset($uri[3])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

//./agpaytech-assesment/Controller/api/CountryController.php

require PROJECT_ROOT_PATH . "/Controller/api/CurrencyController.php";
 
$objFeedController = new CurrencyController();
$strMethodName = $uri[3] . 'Action';
$objFeedController->{$strMethodName}();
?>