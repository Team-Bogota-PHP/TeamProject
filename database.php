<?php
$serverName = 'localhost';
$username = 'root';
$password = '';
$db = 'gallery';

//Connect to database
$con = new mysqli($serverName, $username, $password, $db);

//Check database connection
if ($con->connect_error) {
    die('Connection failed: ' . $con->connect_error);
}

?>
