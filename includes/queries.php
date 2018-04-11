<?php
/**
 * Created by PhpStorm.
 * User: shai
 * Date: 03/04/2018
 * Time: 23:47
 */

//all queries needs to be define here
/* my DB
 * coordination drone_id , time , lat , long
 * drone id  , color  , active , deleted
 * drone_pilot drone_id , pilot_id , active , deleted
 * photo time , drone_id , url
 * pilot id, name
 */

require_once("DBConnector.php");

define("SQL_SELECT_DRONES", <<<SQL_SELECT_DRONES
        SELECT * FROM drone;
SQL_SELECT_DRONES
);


define("SQL_SELECT_PILOTS", <<<SQL_SELECT_PILOTS
        SELECT * FROM pilot;
SQL_SELECT_PILOTS
);

define("SQL_SELECT_DRONE_PILOT", <<<SQL_SELECT_DRONE_PILOT
        SELECT * FROM drone_pilot WHERE active = 1 AND deleted =0;
SQL_SELECT_DRONE_PILOT
);

// bind param
define("SQL_SHOW_COOR_BY_DRONE_ID", <<<SQL_SHOW_COOR_BY_DRONE_ID
        SELECT drone_id, `time`, `lat`, `long` from coordination WHERE drone_id = 2 group by 1,2;
SQL_SHOW_COOR_BY_DRONE_ID
);

