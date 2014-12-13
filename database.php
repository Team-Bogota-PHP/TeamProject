<?php
$serverName = 'localhost';
$username = 'atlas95e_quickbe';
$password = 'manutd123';
$db = 'atlas95e_gallery';

//Connect to database
$con = new mysqli($serverName, $username, $password, $db);

//Check database connection
if ($con->connect_error) {
    die('Connection failed: ' . $con->connect_error);
}

?>
