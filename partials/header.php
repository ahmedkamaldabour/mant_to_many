<?php
session_start();
if (strpos($_SERVER['REQUEST_URI'], '.php') !== false) {
    $url = str_replace(basename($_SERVER['REQUEST_URI']), '', $_SERVER['REQUEST_URI']);
} else {
    $url = $_SERVER['REQUEST_URI'];
}
define('URL', 'http://'.$_SERVER['HTTP_HOST'].$url);
define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/'.$url);
?>
<!doctype html>
<html lang='en'>
<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css'
          integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>

    <title>Category</title>
</head>
<body>