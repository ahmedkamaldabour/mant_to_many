<?php
require_once 'partials/header.php';


$id = $_GET['id'];
require_once ROOT . 'handler/students.php';
deleteStudent($id);


