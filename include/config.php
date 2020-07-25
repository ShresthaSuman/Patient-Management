<?php
define("BASE_URL", "http://localhost/pms");

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PWD", "");
define("DATABASE", "pms");

$con =new mysqli(HOSTNAME, USERNAME, PWD,DATABASE);
if(!$con){
    die("Unable to connect.");
}

/*$db = mysqli_select_db(DATABASE,$con);
if(!$db){
    die("Database does not exists");
}
?> */