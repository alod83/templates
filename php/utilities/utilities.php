<?php

/* Connection to a mysql database. This function returns 
 * the reference to the connection. */
function mysqlconnect($db_name, $user, $password)
{
	$conn = mysqli_connect("localhost",$user, $password);

	if(!$conn) die("Connection Error".mysqli_error()); 

	$ok = mysqli_select_db($conn ,$db_name);
	if(!$ok) die("Error while selecting db $db_name".mysql_errno()); 
	return $conn;
}

?>