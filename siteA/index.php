<?php

$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
header('Access-Control-Allow-Origin:' . $origin);
header('Access-Control-Allow-Methods:POST,GET');
header('Access-Control-Allow-Credentials: true');


$url = $_SERVER['REQUEST_URI'];

if ($url == '/login') {
  setcookie("uid", "thisismyuid");
  setcookie("sss", "sasas");
}

if ($url == '/article') {
  var_dump($_POST);
}


