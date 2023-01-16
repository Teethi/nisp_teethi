<?php
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','nisp');
//Create connection using object oriented way
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//Check Connection
if ($db->connect_errno) {
    echo "Connect failed: <br />" . $db->connect_error;
    exit();
}

?>