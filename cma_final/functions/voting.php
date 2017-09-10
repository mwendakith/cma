<?php
	$con = mysql_connect("localhost", "root", "");
		
	if(!con){
		die("Database connection failed: " . mysql_error());
	}	
	
	$db_select = mysql_select_db("cma", $con);
	
	if(!$db_select){
	die("Database connection failed: " . mysql_error());
	}
	//This gets the ID numbers of the people the user has voted for
		$division = $_POST["division"];
		$chair = $_POST["chair"];
		$vchair = $_POST["vchair"];
		$v2chair = $_POST["2vchair"];
		$sec = $_POST["sec"];
		$ass_sec = $_POST["ass_sec"];
		$org_sec = $_POST["org_sec"];
		$ass_org_sec = $_POST["ass_org_sec"];
		$treasurer = $_POST["treasurer"];
		
	//This updates the number of votes the candidates have
		$sql = "UPDATE election ";
		$sql.="SET tally=tally+1 ";
		$sql.="WHERE division_no='{$division}' ";
		$sql.="AND ID_No='{$chair}'; ";
		mysql_query($con, $sql);
		
	//This ensures that members do not vote twice
		$nid = $GET['National_ID'];
		$sql = "UPDATE TABLE Members SET Vote_status = 1 WHERE National_ID = '{$nid}'";
		mysql_query($con, $sql);
		
		
		
		
		
		
		
		
		
		
		
?>