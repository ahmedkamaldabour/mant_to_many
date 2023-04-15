<?php


// function that returns the connection to the database
const DB_HOST = 'localhost';
const DB_NAME = 'many_to_many';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';


function getConnection()
{
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die('Connection failed: ' . mysqli_error_string($conn));
    }
    return $conn;
}

//-------------------------------------------------------------

//$catTable = "CREATE TABLE IF NOT EXISTS `categories`
//            (
//                `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
//                `name` VARCHAR (50) NOT NULL
//            )
//" ;
//
//$conn = getConnection();
//
//$r = mysqli_query($conn , $catTable);
//
//die($r);
//if($r){
//    echo 'done';
//}

//----------------------------------------------------------------------

//
//$sql = "INSERT INTO `categories`(`name`) VALUES ('CAT ONE') ";
//
//$conn = getConnection();
//$r = mysqli_query($conn , $sql);
//
//die($r);