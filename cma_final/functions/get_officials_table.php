<?php
$division = $_GET['division'];
$area;
switch ($division){
	case 1:
		$area = 1;
		break;
	case 2:
		$area = $_SESSION['Archdiocese_ID'];
		break;
	case 3:
		$area = $_SESSION['Diocese_ID'];
		break;
	case 4:
		$area = $_SESSION['Deanery_ID'];
		break;
	case 5:
		$area = $_SESSION['Parish_ID'];
		break;
	case 6:
		$area = $_SESSION['Outstation_ID'];
		break;
	default:
		break;						
}
echo "<table>";

$sql = "SELECT * FROM `Officials` WHERE `List_ID`='{$area}'";
$result = mysql_query($sql);
echo "<th>Chairman</th> <th>Vice Chair</th> <th>Assistant Vice Chair</th> <th>Secretary</th> <th>Assistant Secretary</th> <th>Organising Secretary</th> <th>Assistant Organising Secretary</th> <th>Treasurer</th>";
while ($row = mysql_fetch_array($result)){
	// These temporarily hold the National ID of the officials
	$chair = $row["Chairman"];
	$vchair = $row["Vice_Chair"];
	$v2chair = $row["Vice_Chair2"];
	$sec = $row["Secretary"];
	$ass_sec = $row["Assistant_Sec"];
	$org_sec = $row["Organising_Sec"];
	$ass_org_sec = $row["Ass_Organising_Sec"];
	$treasurer = $row["Treasurer"];
	
	// The anchor creates a link to the view profile page with a value of the id of the official
	
	// This creates the cell holding the name of the chairman
	echo "<tr>";
	echo "<td><a href='../view_member.php?nid={$chair}' target='_blank'>" . get_surname($chair) . " " . get_fname($chair) . "</a></td>";
	echo "<td><a href='../view_member.php?nid={$vchair}' target='_blank'>" . get_surname($vchair) . " " . get_fname($vchair) . "</a></td>";
	echo "<td><a href='../view_member.php?nid={$v2chair}' target='_blank'>" . get_surname($v2chair) . " " . get_fname($v2chair) . "</a></td>";
	echo "<td><a href='../view_member.php?nid={$sec}' target='_blank'>" . get_surname($sec) . " " . get_fname($sec) . "</a></td>";
	echo "<td><a href='../view_member.php?nid={$ass_sec}' target='_blank'>" . get_surname($ass_sec) . " " . get_fname($ass_sec) . "</a></td>";
	echo "<td><a href='../view_member.php?nid={$org_sec}' target='_blank'>" . get_surname($org_sec) . " " . get_fname($org_sec) . "</a></td>";
	echo "<td><a href='../view_member.php?nid={$ass_org_sec}' target='_blank'>" . get_surname($ass_org_sec) . " " . get_fname($ass_org_sec) . "</a></td>";
	echo "<td><a href='../view_member.php?nid={$treasurer}' target='_blank'>" . get_surname($treasurer) . " " . get_fname($treasurer) . "</a></td>";
	echo "</tr>";
	
	}
	
	echo "</table>";
	
	

	function get_surname($nid){
		$sql = "SELECT * FROM `Members` WHERE `National_ID`='{$nid}'";
		$myquery = mysql_query($sql);
		$surname = mysql_fetch_array($myquery);
		return $surname['Surname'];
	}
	
	function get_fname($nid){
		$sql = "SELECT * FROM `Members` WHERE `National_ID`='{$nid}'";
		$myquery = mysql_query($sql);
		$surname = mysql_fetch_array($myquery);
		return $surname['First_Name'];
	}




?>