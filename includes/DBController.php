<?php
/**
 * Created by PhpStorm.
 * User: shai
 * Date: 22/03/2018
 * Time: 21:48
 */

//מקבל בקשה מאיזה לקוח שפוה לקונטרולר
/* my DB
 * coordination drone_id , time , lat , long
 * drone id  , color  , active , deleted
 * drone_pilot drone_id , pilot_id , active , deleted
 * photo time , drone_id , url
 * pilot id, name
 */
require_once("queries.php");
require_once("DBConnector.php");
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : false;

// shai'.com?action=getall
$value = isset($_REQUEST['value']) ? $_REQUEST['value'] : false;
// shai'.com?action=getall&value=activedrones'
$result = null;

echo 'db controller' . $action;
if(isset($action)){
    switch ($action) {
        case ($action == 'getAll') :
            echo 'in action';
           $result = getAll(SQL_SELECT_DRONES);
            break;
        case ($action == 'getDroneById' && isset($value)) :

            $result = getById(SQL_SHOW_COOR_BY_DRONE_ID, $value);
           echo  '>>>>>>' . $result . ' <<<<< ';
            break;
        }
}


function getAll($query){
  $res = query($query);
    var_dump($res);
  return $res;
}


function getById($query, $id){
    $connection = openCon();
    $stmt = $connection->prepare($query);
    //$stmt->bind_param("i", $id);
    $result = $stmt->execute();
    closeCon($connection);

    return $result;
}
