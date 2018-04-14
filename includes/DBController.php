<?php
/**
 * Created by PhpStorm.
 * User: shai
 * Date: 22/03/2018
 * Time: 21:48
 */


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

$value = isset($_REQUEST['value']) ? $_REQUEST['value'] : false;
$result = null;

echo  $action;
if(isset($action)){
    switch ($action) {
        case ($action == 'getAllDrones') :
           $result = getAllDrones(SQL_SELECT_DRONES);
            echo $result;

            break;
        case ($action == 'getDroneById') :

            $result = getDroneById(SQL_SHOW_COOR_BY_DRONE_ID, $value);
            echo $result;
            break;
        case ($action == 'getPhotoById' ) :

            $result = getPhotoById(SQL_SHOW_PHOTO);
            echo $result;

            break;
        }
}


function getAllDrones($query){
  $res = query($query);
  return $res;
}


function getDroneById($query){
    $connection = openCon();
    $stmt = $connection->prepare($query);
    $result = $stmt->execute();
    closeCon($connection);

    return $result;
}

function getPhotoById($query){
    $connection = openCon();
    $stmt = $connection->prepare($query);
    $result = $stmt->execute();
    closeCon($connection);
    return $result;
}

function insertPhoto($query,$time,$dorneId,$url){
    $connection = openCon();
    $stmt = $connection->prepare($query);
    $result = $stmt->execute();
    closeCon($connection);
    return $result;
}

