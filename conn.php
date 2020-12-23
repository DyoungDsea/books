<?php
session_start();

//check whether on localhost or online
$localhost = array(
    '127.0.0.1',
    '::1'
);

if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_ENGINE', "books");
}
else {
define('DB_SERVER', "localhost");
define('DB_USER', "bookfren_server");
define('DB_PASSWORD', "admin100@");
define('DB_ENGINE', "bookfren_server");
}

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_ENGINE);

if ($conn->connect_error) {
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

putenv("TZ=Africa/Lagos");
?>