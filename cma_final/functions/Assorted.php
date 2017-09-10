<?php

$con = mysql_connect("localhost", "root", "");
		
	if(!con){
		die("Database connection failed: " . mysql_error());
	}	
	
	$db_select = mysql_select_db("cma", $con);
	
	if(!$db_select){
	die("Database connection failed: " . mysql_error());
	}
	
	//Select the details of a member
	$sql = "SELECT Outstation_ID FROM Members WHERE National_ID = '{}'";
	$get_outstation = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_outstation);
	$oustation_ID = $row["outstation_ID"];
	
	$sql = "SELECT Parish_ID FROM Outstation WHERE Outstation_ID = '{}'";
	$get_parish = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_parish);
	$parish_ID = $row["Parish_ID"];
	
	$sql = "SELECT Deanery_ID FROM Parish WHERE Parish_ID = '{}'";
	$get_deanery = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_deanery);
	$deanery_ID = $row["Deanery_ID"];
	
	$sql = "SELECT Diocese_ID FROM Deanery WHERE Deanery_ID = '{}'";
	$get_diocese = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_diocese);
	$diocese_ID = $row["Diocese_ID"];
	
	$sql = "SELECT Archdiocese_ID FROM diocese WHERE Diocese_ID = '{}'";
	$get_archdiocese = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_archdiocese);
	$archdiocese_ID = $row["archdiocese_ID"];
	

	
	//Variables to store details of the place holding the election
	$division;
	$division_level;
	$division_id;
	//Setting an election
	$start_election = "UPDATE TABLE '{$division}' SET Election_status = 1 WHERE '{$division_level}' = '{$division_id}'";
	
	//
	

?>