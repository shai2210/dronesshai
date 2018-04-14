<?php
/**
 * Created by PhpStorm.
 * User: shai
 * Date: 22/03/2018
 * Time: 21:09
 */
//
//define("DB_HOST", "sql2.freemysqlhosting.net");
//define("DB_NAME", "sql2232091");
//define("DB_USER", "sql2232091");
//define("DB_PASS", "dM9%nT5%");



define("DB_HOST", "localhost");
define("DB_NAME", "mysql_drone");
define("DB_USER", "root");
define("DB_PASS", "");

function openCon(){
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME)
    or die("Connect failed: %s\n" . $connection->error);
    return $connection;
}

function closeCon($connection){
    $connection->close();
}


//https://www.w3schools.com/php/php_mysql_prepared_statements.asp

function query($query){
    $connection = openCon();
    $result = $connection->query($query);
    //'closeCon($connection);
var_dump($result);
    return $result;
}




