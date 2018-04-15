<?php
/**
 * Created by PhpStorm.
 * User: shai
 * Date: 03/04/2018
 * Time: 23:47
 */

//all queries needs to be define here
//שאילתות שאני צריך:רחפנים להוסיף רחפן להציג את כלל הרחפנים ok
//ok קורדינטות להוסיף קורדינ
//OK ////טייסים להוסיף טייס
//תמונות להוסיף תמונה ולהחזיר תמונה לרחפן כלומר טייס ספציפי להציג את התמונה האחרונה מהרחפן שלו
//משותפות: החזרת כל הקורדינטות עלפי רחפן מסוים ובנוסף את שם הטייס
//OK//להחזיר תמונה על פי לחיצה על קורדינטה

/* my DB
 * coordination drone_id , time , lat , long
 * drone id  , color  , active , deleted
 * drone_pilot drone_id , pilot_id , active , deleted
 * photo time , drone_id , url
 * pilot id, name
 */

require_once("DBConnector.php");

//pilot table
//get all pilots uses for the list in manager screen
define("SQL_SELECT_PILOTS", <<<SQL_SELECT_PILOTS
        SELECT * FROM pilot;
SQL_SELECT_PILOTS
);

//insert a pilot by id, name need to complete bind param in func at DBController
define("INSERT_PILOT", <<<INSERT_PILOT
    INSERT INTO pilot(id, `name`) VALUES (?, ?, ? , ?);
INSERT_PILOT
);


define("SQL_SELECT_DRONE_PILOT", <<<SQL_SELECT_DRONE_PILOT
        SELECT * FROM drone_pilot WHERE active = 1;
SQL_SELECT_DRONE_PILOT
);


//photo table quarries
//insert a photo by time , drone_id , url need to complete bind param in func at DBController
define("INSERT_PHOTO", <<<INSERT_PHOTO
    INSERT INTO photo(`time`,drone_id,url) VALUES (?, ?, ?);
INSERT_PHOTO
);

//show last photo by a drone now its just last photo i need to pick drone id for pilot
define("LAST_PHOTO", <<<LAST_PHOTO
    SELECT * FROM photo ORDER BY drone_id DESC LIMIT 1
LAST_PHOTO
);

//return specific photo by selected mark
define("PHOTO_BY_COORDINATE", <<<PHOTO_BY_COORDINATE
    SELECT `url` from photo  WHERE drone_id = 2 AND time=5;
PHOTO_BY_COORDINATE
);

//drone tables quarries
//insert a drone by id  , color  , active , deleted need to complete bind param in func at DBController
define("INSERT_DRONE", <<<INSERT_DRONE
    INSERT INTO drone(id,color,active,deleted) VALUES (?, ?, ? , ?);
INSERT_DRONE
);

define("SQL_SELECT_DRONES", <<<SQL_SELECT_DRONES
        SELECT * FROM drone;
SQL_SELECT_DRONES
);

//coordination quarries
//insert a coordinate by drone_id , time , lat , long need to complete bind param in func at DBController
define("INSERT_COORDINATE", <<<INSERT_COORDINATE
    INSERT INTO coordination (drone_id,`time`,lat,long) VALUES (?, ?, ? , ?);
INSERT_COORDINATE
);

// bind param returns all coordinates of chosen drone
define("SQL_SHOW_COOR_PHOTO_BY_DRONE_ID", <<<SQL_SHOW_COOR_PHOTO_BY_DRONE_ID
        SELECT drone_id, `time`, `lat`, `long` from coordination WHERE drone_id = 2 group by 1,2;
SQL_SHOW_COOR_PHOTO_BY_DRONE_ID
);
