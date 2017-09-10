
<?php
require_once("../includes/session.php");
 require("../includes/connection.php");?>
<?php include("../includes/functions.php");?>

<?php
$date = getdate();
$year = $date['year'];

$division = $_POST['Division'];
$division_id = $_POST['Division_id'];
$new_chair = $_POST['Chairman'];
$new_vice = $_POST['Vice'];
$new_ass_vice = $_POST['Ass_Vice'];
$new_sec = $_POST['Sec'];
$new_ass_sec = $_POST['Ass_Sec'];
$new_org_sec = $_POST['Org_Sec'];
$new_ass_org_sec = $_POST['Ass_Org'];
$new_treasurer = $_POST['Treasurer'];

// Updates the officials table
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
	 
	 // This is the rank of a losing incumbent
	 $demote;
	 
	 if($division == 1){
		 $rank = 1;
		 $demote = 2;
	 }
	 else if($division == 2){
		 $rank = 2;
		 $demote = 3;
	 }
	  else if($division == 3){
		 $rank = 3;
		 $demote = 4;
	 }
	  else if($division == 4){
		 $rank = 4;
		 $demote = 5;
	 }
	  else if($division == 5){
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
	 redirect_to("../manual_polls.php");


?>