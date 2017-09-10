<?php

// Opens the voting period for a division
// Also sets the closing time for the voting period
// 

function election_start($division, $division_id, $primary_key){
	// $x = $_POST[''];
	$deadline = time();
	$deadline += (60*60*24*7);
	$sql = "UPDATE TABLE `{$division}` ";
	$sql .= "SET Vote_Status  = 1 ";
	$sql .= "WHERE {'$primary_key'}  = {'$division_id'}; ";
	
	$sql .= "UPDATE TABLE `{$division}` ";
	$sql .= "SET deadline  = '{$deadline}' ";
	$sql .= "WHERE '{$primary_key}'  = '{$division_id}'; ";
	
	mysql_query($sql, $con);
}

function election_stop(){
	$sql = "UPDATE TABLE `{$division}` ";
	$sql .= "SET Vote_Status  = 0 AND ";
	$sql .= "SET deadline  = NULL ";
	$sql .= "WHERE '{$primary_key}'  = '{$division_id}'; ";
	mysql_query($sql, $con);
}




?>