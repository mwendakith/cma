
<?php 
require("../includes/connection.php");
require("../includes/session.php");
include("../includes/functions.php");  
include("voting_period.php");?>


<?php
$division = $_POST['division'];
$status = $_POST['status'];
// Table name is the name of the affected table
$table_name;
// id is the primary key identifier of the division being updated
$id;
// original_status is the status according to the db
$original_status;
// Sets the year of the election
$date = getdate();
$year = $date['year'];


switch($division){
	case 6:
		$table_name = "Outstation";
		$id = $_SESSION['Outstation_ID'];
		$colname = "Outstation_ID";
		break;
	case 5:
		$table_name = "Parish";
		$id = $_SESSION['Parish_ID'];
		$colname = "Parish_ID";
		break;
	case 4:
		$table_name = "Deanery";
		$id = $_SESSION['Deanery_ID'];
		$colname = "Deanery_ID";
		break;	
	case 3:
		$table_name = "Diocese";
		$id = $_SESSION['Diocese_ID'];
		$colname = "Diocese_ID";
		break;
	
	case 2:
		$table_name = "Archdiocese";
		$id = $_SESSION['Archdiocese_ID'];
		$colname = "Archdiocese_ID";
		break;
	case 1:
		$table_name = "Nation";
		$id = 1;
		$colname = "Nation_ID";
		break;
	default:
		break;
}
$sql = "SELECT * FROM `{$table_name}` WHERE `{$colname}` = {$id}";
$result = mysql_query($sql, $connection);
// confirm_query($result);
$row = mysql_fetch_array($result);

$original_value = $row['Election_Status'];

if($original_value == 1 && $status == 2){
	echo "The voting period is active. You cannot revert it to the nomination period.";
}

else{
	$update = "UPDATE `{$table_name}` SET `Election_Status` = {$status} WHERE `{$colname}` = {$id}";
	mysql_query($update, $connection);
		if(mysql_affected_rows() == 1){
			echo "Update was successful";
			
			if($status == 1){
				election_start($division, $id, $colname);
			}
		}
}

redirect_to("../election_status.php");

?>