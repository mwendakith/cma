<?php	include("includes/connection.php");	?>

<?php
	//Function to handle the new member form
	global $connection;
	$id = $_POST['National_ID'];
	$sname = $_POST['Last_name'];
	$fname = $_POST['First_Name'];
	$oname = $_POST['Other_Name'];
	$mobile = $_POST['Mobile'];
	$house_no = $_POST['House_No'];
	$SCC = $_POST['SCC'];
	$NOK = $_POST['NOK'];
	$NOK_name = $_POST['NOK_name'];
	$NOK_No = $_POST['NOK_No'];
	
	$outstation = $_SESSION['Outstation_ID'];
	
		$sql = "INSERT INTO `Members`(`National_ID`, `Surname`, `First_Name`, `Other_Names`, `Outstation_ID`) "; 
		$sql .= "VALUES ('{$id}', '{$sname}', '{$fname}', '{$oname}', '{$mobile}', '{$house_no}', '{$SCC}', '{$NOK}', '{$outstation}')";
	
		mysql_query($connection, $sql);
		
		$sql = "INSERT INTO `Next_Of_Kin` () ";
		$sql .= "VALUES ('{$NOK}', '{$NOK_name}',);";

?>