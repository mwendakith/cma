

<?php

// Opens the voting period for a division
// Also sets the closing time for the voting period
// Sets the year of the election
$date = getdate();
$year = $date['year'];

function election_start($division, $division_id, $primary_key){
	$date = getdate();
	$deadline = $date[0];
	$deadline += (60*60*24*3);
	$sql = "UPDATE TABLE `{$division}` ";
	$sql .= "SET Vote_Status=1, `deadline`='{$deadline}' ";
	$sql .= "WHERE `{$primary_key}`='{$division_id}'; ";
	
	mysql_query($sql);
}

// Checks if the election period has expired
// If it has expired it calls the election_stop function
function check_deadline($division, $division_id, $primary_key){
	$date = getdate();
	$deadline = $date[0];
	$sql = "SELECT * FROM `{$division}` WHERE `{$primary_key}`  = '{$division_id}'; ";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if ($deadline < $row['Deadline']){
		return;
	}
	else{
		election_stop($division, $division_id, $primary_key);
	}
	
}

function election_stop($division, $division_id, $primary_key){
	$sql = "UPDATE TABLE `{$division}` ";
	$sql .= "SET Vote_Status  = 0, deadline=NULL ";
	$sql .= "WHERE `{$primary_key}` = '{$division_id}'; ";
	mysql_query($sql);
	set_officials($division, $division_id, $primary_key);
}

function set_officials($division, $division_id, $primary_key){
	// Sets the year of the election
	$date = getdate();
	$year = $date['year'];
	
	// Retrieves the id no of the winning chairman and stores it in a variable
	$sql = "SELECT * FROM `Election` WHERE `Area_ID`='{$division_id}' AND `Post_ID`=2 AND `Year`='{$year}' AND `tally`>ALL;";
	$result = mysql_query($sql);
	$chair = mysql_fetch_array($result);
	$new_chair = $chair['ID_No'];
	mysql_free_result($result);
	
	// Retrieves the id no of the winning vice chair and stores it in a variable
	$sql = "SELECT * FROM `Election` WHERE `Area_ID`='{$division_id}' AND `Post_ID`=3 AND `Year`='{$year}' AND `tally`>ALL;";
	$result = mysql_query($sql);
	$vice = mysql_fetch_array($result);
	$new_vice = $vice['ID_No'];
	mysql_free_result($result);
	
	// Retrieves the id no of the winning assistant vice chair and stores it in a variable
	$sql = "SELECT * FROM `Election` WHERE `Area_ID`='{$division_id}' AND `Post_ID`=4 AND `Year`='{$year}' AND `tally`>ALL;";
	$result = mysql_query($sql);
	$ass_vice = mysql_fetch_array($result);
	$new_ass_vice = $ass_vice['ID_No'];
	mysql_free_result($result);
	
	// Retrieves the id no of the winning secretary and stores it in a variable
	$sql = "SELECT * FROM `Election` WHERE `Area_ID`='{$division_id}' AND `Post_ID`=5 AND `Year`='{$year}' AND `tally`>ALL;";
	$result = mysql_query($sql);
	$sec = mysql_fetch_array($result);
	$new_sec = $sec['ID_No'];
	mysql_free_result($result);
	
	// Retrieves the id no of the winning assistant secretary and stores it in a variable
	$sql = "SELECT * FROM `Election` WHERE `Area_ID`='{$division_id}' AND `Post_ID`=6 AND `Year`='{$year}' AND `tally`>ALL;";
	$result = mysql_query($sql);
	$ass_sec = mysql_fetch_array($result);
	$new_ass_sec = $ass_sec['ID_No'];
	mysql_free_result($result);
	
	// Retrieves the id no of the winning orgainising secretary and stores it in a variable
	$sql = "SELECT * FROM `Election` WHERE `Area_ID`='{$division_id}' AND `Post_ID`=7 AND `Year`='{$year}' AND `tally`>ALL;";
	$result = mysql_query($sql);
	$org_sec = mysql_fetch_array($result);
	$new_org_sec = $org_sec['ID_No'];
	mysql_free_result($result);
	
	// Retrieves the id no of the winning assistant orgainising secretary and stores it in a variable
	$sql = "SELECT * FROM `Election` WHERE `Area_ID`='{$division_id}' AND `Post_ID`=8 AND `Year`='{$year}' AND `tally`>ALL;";
	$result = mysql_query($sql);
	$ass_org_sec = mysql_fetch_array($result);
	$new_ass_org_sec = $ass_org_sec['ID_No'];
	mysql_free_result($result);
	
	// Retrieves the id no of the winning treasurer and stores it in a variable
	$sql = "SELECT * FROM `Election` WHERE `Area_ID`='{$division_id}' AND `Post_ID`=9 AND `Year`='{$year}' AND `tally`>ALL;";
	$result = mysql_query($sql);
	$treasurer = mysql_fetch_array($result);
	$new_treasurer = $treasurer['ID_No'];
	mysql_free_result($result);
	
	// Adds a list to the officials table
	$sql = "INSERT INTO `Officials` (`Area_ID`, `Year`, `Chairman`, `Vice_Chair`, `Vice_Chair2`, `Secretary`, `Assistant_Sec`, `Organising_Sec`, `Ass_Organising_Sec`, `Treasurer`) ";
	$sql .= "VALUES ('{$division_id}', '{$year}', '{$new_chair}', '{$new_vice}', '{$new_ass_vice}', '{$new_sec}', '{$new_ass_sec}', '{$new_org_sec}', '{$new_ass_org_sec}', '{$new_treasurer}')";
	 mysql_query($sql);
	 
	 // Gets the list of existing officials
	 $sql = "SELECT * FROM `Officials_Present` WHERE `List_ID`='{$division_id}'";
	 $old_list =  mysql_query($sql);
	 $old = mysql_fetch_array($old_list);
	 $old_chair = $old['Chairman'];
	 $old_vice = $old['Vice_Chair'];
	 $old_ass_vice = $old['Vice_Chair2'];
	 $old_sec = $old['Secretary'];
	 $old_ass_sec = $old['Assistant_Sec'];
	 $old_org_sec = $old['Organising_Sec'];
	 $old_ass_org_sec = $old['Ass_Organising_Sec'];
	 $old_treasurer = $old['Treasurer'];
	 mysql_free_result($old_list);
	 
	 // This is the existing rank of the incumbents
	 $rank;
	 $demote;
	 
	 if($division == "Nation"){
		 $rank = 1;
		 $demote = 2;
	 }
	 else if($division == "Archdiocese"){
		 $rank = 2;
		 $demote = 3;
	 }
	  else if($division == "Diocese"){
		 $rank = 3;
		 $demote = 4;
	 }
	  else if($division == "Deanery"){
		 $rank = 4;
		 $demote = 5;
	 }
	  else if($division == "Parish"){
		 $rank = 5;
		 $demote = 6;
	 }
	 else{
		$rank = 6;
		$demote = 6;	 
	 }
	 
	 
	 
	 // Checks if the incumbents have been reelected
	 // If not it demotes them before promoting the newcomer
	 // Otherwise no change happens
	 
	 // Chairman
	 if ($new_chair != $old_chair){
		if($rank == 6){
			$sql = "UPDATE `Members` SET `Post_ID`=10 WHERE `National_ID`='{$old_chair}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Post_ID`=2 WHERE `National_ID`='{$new_chair}'";
			mysql_query($sql);
		}
		else{
			$sql = "UPDATE `Members` SET `Division_ID`='{$demote}' WHERE `National_ID`='{$old_chair}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Division_ID`='{$rank}' WHERE `National_ID`='{$new_chair}'";
			mysql_query($sql);
		}		 
	 }
	 
	  // Vice Chairman
	 if ($new_vice != $old_vice){
		if($rank == 6){
			$sql = "UPDATE `Members` SET `Post_ID`=10 WHERE `National_ID`='{$old_vice}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Post_ID`=3 WHERE `National_ID`='{$new_vice}'";
			mysql_query($sql);
		}
		else{
			$sql = "UPDATE `Members` SET `Division_ID`='{$demote}' WHERE `National_ID`='{$old_vice}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Division_ID`='{$rank}' WHERE `National_ID`='{$new_vice}'";
			mysql_query($sql);
		}		 
	 }
	 
	  // Assistant Vice Chairman
	 if ($new_ass_vice != $old_ass_vice){
		if($rank == 6){
			$sql = "UPDATE `Members` SET `Post_ID`=10 WHERE `National_ID`='{$old_ass_vice}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Post_ID`=4 WHERE `National_ID`='{$new_ass_vice}'";
			mysql_query($sql);
		}
		else{
			$sql = "UPDATE `Members` SET `Division_ID`='{$demote}' WHERE `National_ID`='{$old_ass_vice}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Division_ID`='{$rank}' WHERE `National_ID`='{$new_ass_vice}'";
			mysql_query($sql);
		}		 
	 }
	 
	  // Secretary
	 if ($new_sec != $old_sec){
		if($rank == 6){
			$sql = "UPDATE `Members` SET `Post_ID`=10 WHERE `National_ID`='{$old_sec}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Post_ID`=5 WHERE `National_ID`='{$new_sec}'";
			mysql_query($sql);
		}
		else{
			$sql = "UPDATE `Members` SET `Division_ID`='{$demote}' WHERE `National_ID`='{$old_sec}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Division_ID`='{$rank}' WHERE `National_ID`='{$new_sec}'";
			mysql_query($sql);
		}		 
	 }
	 
	  // Assistant Secretary
	 if ($new_ass_sec != $old_ass_sec){
		if($rank == 6){
			$sql = "UPDATE `Members` SET `Post_ID`=10 WHERE `National_ID`='{$old_ass_sec}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Post_ID`=6 WHERE `National_ID`='{$new_ass_sec}'";
			mysql_query($sql);
		}
		else{
			$sql = "UPDATE `Members` SET `Division_ID`='{$demote}' WHERE `National_ID`='{$old_ass_sec}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Division_ID`='{$rank}' WHERE `National_ID`='{$new_ass_sec}'";
			mysql_query($sql);
		}		 
	 }
	 
	  // Organising Secretary
	 if ($new_org_sec != $old_org_sec){
		if($rank == 6){
			$sql = "UPDATE `Members` SET `Post_ID`=10 WHERE `National_ID`='{$old_org_sec}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Post_ID`=7 WHERE `National_ID`='{$new_org_sec}'";
			mysql_query($sql);
		}
		else{
			$sql = "UPDATE `Members` SET `Division_ID`='{$demote}' WHERE `National_ID`='{$old_org_sec}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Division_ID`='{$rank}' WHERE `National_ID`='{$new_org_sec}'";
			mysql_query($sql);
		}		 
	 }
	 
	  // Assistant Organising Secretary
	 if ($new_ass_org_sec != $old_ass_org_sec){
		if($rank == 6){
			$sql = "UPDATE `Members` SET `Post_ID`=10 WHERE `National_ID`='{$old_ass_org_sec}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Post_ID`=8 WHERE `National_ID`='{$new_ass_org_sec}'";
			mysql_query($sql);
		}
		else{
			$sql = "UPDATE `Members` SET `Division_ID`='{$demote}' WHERE `National_ID`='{$old_ass_org_sec}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Division_ID`='{$rank}' WHERE `National_ID`='{$new_ass_org_sec}'";
			mysql_query($sql);
		}		 
	 }
	 
	  // Treasurer
	 if ($new_treasurer != $old_treasurer){
		if($rank == 6){
			$sql = "UPDATE `Members` SET `Post_ID`=10 WHERE `National_ID`='{$old_treasurer}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Post_ID`=9 WHERE `National_ID`='{$new_treasurer}'";
			mysql_query($sql);
		}
		else{
			$sql = "UPDATE `Members` SET `Division_ID`='{$demote}' WHERE `National_ID`='{$old_treasurer}'";
			mysql_query($sql);
			$sql = "UPDATE `Members` SET `Division_ID`='{$rank}' WHERE `National_ID`='{$new_treasurer}'";
			mysql_query($sql);
		}		 
	 }
	 
	 $sql = "UPDATE `Officials_Present` SET `Chairman`='{$new_chair}', `Vice_Chair`='{$new_vice}', `Vice_Chair2`='{$new_ass_vice}', `Secretary`='{$new_sec}', `Assistant_Sec`='{$new_ass_sec}', `Organising_Sec`='{$new_org_sec}', `Ass_Organising_Sec`='{$new_ass_org_sec}', `Treasurer`='{$new_treasurer}' WHERE `List_ID`='{$division_id}'";
	 mysql_query($sql);
	 
}


?>