<?php include("../includes/connection.php"); ?>
<?php include("../includes/functions.php"); ?>

<?php
	// This retrieves all the data necessary to register the division
	$division = $_POST['Division_level'];
	$name = $_POST['Division_name'];
	$foreign_key = $_POST['key'];
	$index_colname;
	$table_name;
	
	
	
	// Based on which division is being made, the string with the table
	// name and the column name of the foreign key is passed into the variables
	// The variables are then passed into the sql query 
	switch($division){
		case 2:
			$table_name = "Archdiocese";
			$index_colname = "Nation_ID";
			break;
		case 3:
			$table_name = "Diocese";
			$index_colname = "Archdiocese_ID";
			break;
		case 4:
			$table_name = "Deanery";
			$index_colname = "Diocese_ID";
			break;
		case 5:
			$table_name = "Parish";
			$index_colname = "Deanery_ID";
			break;
		case 6:
			$table_name = "Outstation";
			$index_colname = "Parish_ID";
			break;
		default:
			break;
		
	}
	
	// This creates the division
	$sql = "INSERT INTO `{$table_name}` (`Name`, `{$index_colname}`) ";
	$sql .= " VALUES ('{$name}', {$foreign_key}); ";
	
	mysql_query($sql, $connection);
	$key = mysql_insert_id($connection);
	
	
	// This creates an official list
	$sql = "INSERT INTO `Officials_Present` (`List_ID`) ";
	$sql .= " VALUES ({$key}); ";
	
	mysql_query($sql, $connection);
	redirect_to("../new_division.php");
	

?>