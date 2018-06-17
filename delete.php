<?php

require_once("./includes/queries.php");
require_once("./includes/DBConnector.php");


define('PRIVATE_KEY', 'shaimalka123');

if ($_SERVER['REQUEST_METHOD'] === 'GET'
    && $_REQUEST['key'] === PRIVATE_KEY)
{
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : false;

    if($action) {
        switch ($action){
            case 'deleteImage':
                deleteImage();
                break;
            case 'deleteCoordination':
                    deleteCoor();
                break;
            default:
                break;
        }
    }
}

else {
    $response[] = [
        'success' => 'error',
        'action' => 'false'
    ];

echo json_encode($response);
}



function deleteImage(){
    $connection = openCon();

    $query = "delete from `photo` where true";
    if (mysqli_query($connection, $query)) {
        $result = true;
    } else {
        $result = false;
    }
    $response[] = [
        'success' => $result
    ];
    echo json_encode($response);
}

function deleteCoor(){
    $connection = openCon();

    $query = "delete from `coordination` where true";
    if (mysqli_query($connection, $query)) {
        $result = true;
    } else {
        $result = false;
    }
    $response[] = [
        'success' => $result
    ];
    echo json_encode($response);
}