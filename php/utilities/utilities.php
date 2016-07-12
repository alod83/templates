<?php

/* Connection to a mysql database. This function returns 
 * the reference to the connection. */
function mysqlconnect($user, $password,$db_name = null)
{
	$conn = mysqli_connect("localhost",$user, $password);

	if(!$conn) die("Connection Error".mysqli_error()); 

	if(!is_null($db_name))
	{
		$ok = mysqli_select_db($conn ,$db_name);
		if(!$ok) die("Error while selecting db $db_name".mysql_errno()); 
	}
	return $conn;
}

/*
 * This function executes a mysql query and applies function $f to the query result
 * f must be in tollowing form f($row, $return)
 * The best way to invoke this function is the following:
 * $result = mysqlquery($conn,$query, $arg, function ($row, $arg, &aReturn){ // do something; });
 * WARNING: pass $aReturn by reference
 */
function mysqlquery($conn,$q,$arg,$f)
{
	$oResult = mysqli_query($conn,$q);
	$aReturn = array();
	if($oResult !== false && mysqli_num_rows($oResult) > 0)
		while($aRow = mysqli_fetch_assoc($oResult))
			$f($aRow,$arg,$aReturn);		
	return $aReturn;
}


/*
 * This function parses the stdin.
 * $opts should be in a form similar to 's:n:f:l:h'
 * $opts - mandatory parameters
 * $oopts - optional parameters
 */
function get_input($opts, $oopts = false)
{
	// WARNING: this function works only with inputs having a value
	// remove last : to avoid the final empty string
	$opts_array = explode(":",substr($opts, 0, strlen($opts)-1));
		
	$check = false;
	
	$input = getopt($oopts ? $opts.$oopts : $opts);
	
	// check whether the array is empty
	if(empty($input))
	{
		$check = true;
	}
	// check whether all the parameters have been set
	foreach ($opts_array as $opt)
		if(!in_array($opt, array_keys($input))) $check = true;
	
	if($check)
	{
		print_help(); // define print_help() in your code
		exit;
	}
	return $input;
}


?>