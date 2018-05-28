<?php
/**
 * Created by PhpStorm.
 * User: shai
 * Date: 22/03/2018
 * Time: 21:09
 */


define("DB_HOST", "dronedb.cbo8uovs9hka.us-east-1.rds.amazonaws.com");
define("DB_NAME", "dronedb");
define("DB_USER", "root");
define("DB_PASS", "shaimalka85");

function openCon(){
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME)
    or die("Connect failed: %s\n" . $connection->error);
    return $connection;
}
//
//function closeCon($connection){
//    $connection->close();
//}

function query($query){
    $connection = openCon();
    $result = $connection->query($query);
    return $result;
}




