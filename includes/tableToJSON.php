<?php
/**
 * Created by PhpStorm.
 * User: shai
 * Date: 09/04/2018
 * Time: 13:18
 */


/* my DB
 * coordination drone_id , time , lat , long
 * drone id  , color  , active , deleted
 * drone_pilot drone_id , pilot_id , active , deleted
 * photo time , drone_id , url
 * pilot id, name
 */
require_once("DBConnector.php");

    $con = openCon();
    $qury = "SELECT * FROM coordination,photo WHERE coordination.drone_id='1' GROUP BY photo.time";
    $result = $con->query($qury);
    $coor = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          //  echo "lat " . $row["lat"] . "long " . $row["long"]. "time" .$row["time"];
            $object =[$row['lat'],$row['long']];
          //  $coor[$row['$drone_id']] = $object;
            echo $object;
        }
    } else {
        echo "0 results";
    }

    closeCon($con);
