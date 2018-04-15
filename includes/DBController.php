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
        case "getAllDrones" :

                $result = getAllDrones(SQL_SELECT_DRONES);
                echo $result;
            break;
        case "getDroneRouteById" :

            $result = getDroneRouteById(SQL_SHOW_COOR_PHOTO_BY_DRONE_ID);
            echo "res".$result;
            break;
        case "getPhotoById" :

            $result = getPhotoById(PHOTO_BY_COORDINATE);
            echo $result;

            break;

        case "insertDrone" :

            insertDrone(INSERT_DRONE,$droneId,$droneColor,$droneActive,$droneDel);

            break;
        }
}


function getAllDrones($query){
    $con = openCon();
  $res = query($query);
  return $res;
  closeCon($con);
}


function getDroneRouteById($query){
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

//INSERT INTO drone(id,color,active,deleted)
function insertDrone($query,$droneId,$droneColor,$droneActive,$droneDel){
    $con = openCon();
    $stmt = $con->prepare($query);
    $stmt->bind_param("isii",$id,$color,$active,$del);
    $id=$droneId;
    $color = (string)$droneColor;
    $active = $droneActive;
    $del = $droneDel;
    $result = $stmt->execute();
    $stmt->close();
    closeCon($con);
    return $result;
}

