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

            insertDrone(INSERT_DRONE,$id,$color,$active,$del);

            break;

        case "insertPhoto" :
            //* photo time , drone_id , url
            insertPhoto(INSERT_PHOTO,$time,$drone_id,$url);
            break;
        case "getCoordination":
            getCoordination(SQL_SHOW_COOR_PHOTO_BY_DRONE_ID,9);
                break;
        }
}


function getAllDrones($query){
    $con = openCon();
    $res = query($query);
    closeCon($con);
    return $res;

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
function insertDrone($query,$id,$color,$active,$del){
    $con = openCon();
    $stmt = $con->prepare($query);
    $stmt->bind_param("isii",$currId,$currColor,$currActive,$currDel);
    $currId=$id;
    $currColor = (string)$color;
    $currActive = $active;
    $currDel = $del;
    $result = $stmt->execute();
    $stmt->close();
    closeCon($con);
}

//INSERT INTO photo (time , drone_id , url)
function insertPhoto($query,$time,$drone_id,$url){
    $con = openCon();
    $stmt = $con->prepare($query);
    $stmt->bind_param("sis",$currTime,$currDrone , $curUrl);
    $currTime=$time;
    $currDrone = $drone_id;
    $curUrl = $url;
    $result = $stmt->execute();
    $stmt->close();
    closeCon($con);
}

//INSERT INTO coordination (drone_id , time , lat , long)
function insertCoordination($query,$time,$drone_id,$lat,$long){
    $con = openCon();
    $stmt = $con->prepare($query);
    $stmt->bind_param("iidd",$currDrone,$currTime, $curLat, $curLong);
    $currTime=$time;
    $currDrone = $drone_id;
    $curLat = $lat;
    $curLong = $long;
    $result = $stmt->execute();
    $stmt->close();
    closeCon($con);
}

function getCoordination($query,$droneId){
    $con = openCon();
    $stmt = $con->prepare($query);
    $stmt->bind_param("i",$currDrone);
    $stmt->execute();
    $stmt->fetch();
    echo $currDrone;
    $stmt->close();
    closeCon($con);
}
