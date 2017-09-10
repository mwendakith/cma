<?php

//Obtains all the details of a member who has logged in
//Uses the national ID of the member
function store_details($national_id){
	
	//Finds and stores the outstation, post and rank of a member
	//Rank indicates the highest level of leadership of the member
	//The rank is stored as division 
	$sql = "SELECT * FROM Members WHERE National_ID = '{$national_id}'";
	$get_outstation = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_outstation);
	$outstation_ID = $row["outstation_ID"];
	$post = $row["post_ID"];
	$division = $row["division_ID"];
	$_SESSION['outstation'] = $outstation_ID;
	$_SESSION['post'] = $post;
	$_SESSION['division'] = $division;
	
	//Stores the parish id of the member
	$sql = "SELECT Parish_ID FROM Outstation WHERE Outstation_ID = '{$outstation_ID}'";
	$get_parish = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_parish);
	$parish_ID = $row["Parish_ID"];
	$_SESSION['parish'] = $parish_ID;
	
	//Stores the deanery id of the member
	$sql = "SELECT Deanery_ID FROM Parish WHERE Parish_ID = '{$parish_ID}'";
	$get_deanery = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_deanery);
	$deanery_ID = $row["Deanery_ID"];
	$_SESSION['deanery'] = $deanery_ID;
	
	//Stores the diocese id of the member
	$sql = "SELECT Diocese_ID FROM Deanery WHERE Deanery_ID = '{$deanery_ID}'";
	$get_diocese = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_diocese);
	$diocese_ID = $row["Diocese_ID"];
	$_SESSION['diocese'] = $diocese_ID;
	
	//Stores the archdiocese id of the member
	$sql = "SELECT Archdiocese_ID FROM diocese WHERE Diocese_ID = '{$diocese_ID}'";
	$get_archdiocese = mysql_query($con, $sql);
	$row = mysql_fetch_row($get_archdiocese);
	$archdiocese_ID = $row["archdiocese_ID"];
	$_SESSION['archdiocese'] = $archdiocese_ID;
	
	//Stores the nation id of the member
	$_SESSION['nation'] = 1;
	
	
	
}




?>