<?php
$connection_error = 'Sorry, we are experiencing some problems with the connection to the server';
mysql_connect('localhost', 'atlas95e_quickbe', 'manutd123') or die($connection_error); //  or die(mysql_error() (security concern)
mysql_select_db('atlas95e_db') or die($connection_error);


?>