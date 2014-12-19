<?php
$connection_error = 'Sorry, we are experiencing some problems with the connection to the server';
mysql_connect('localhost', 'root', '') or die($connection_error); //  or die(mysql_error() (security concern)
mysql_select_db('db') or die($connection_error);
?>