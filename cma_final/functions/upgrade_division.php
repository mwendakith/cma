<?php include("../includes/connection.php"); ?>
<?php include("../includes/functions.php"); ?>

<?php
// This retrieves all the data necessary to upgrade the division
$div = $_POST['Division_level'];
$divid = $_POST['Division_id'];
$table_name;
$index_colname;
$table_id;
$foreign_key;
$new_foreign;
$new_foreign_key;
$division_name;
$new_table;
$new_primary;

// $divid is the present primary key for the division being elevated
// $table_name represents the table of the division being elevated
// $table_id represents the name of the primary key of the division being elevated
// $index_colname represents the name of the column of the foreign key exisiting in the affected table
// $new_table represents the name of the table where the elevated division will now be stored in
// $new_foreign represents the foreign key column name that the elevated division will have
// $foreign_key indicates the foreign key of the elevated division
// $new_primary is the new primary key of the elevated division
switch($div){
		
		case 3:
			$table_name = "Diocese";
			$table_id = "Diocese_ID";
			$index_colname = "Archdiocese_ID";
			$new_table = "Archdiocese";
			$new_foreign = "Nation_ID";
			break;
		case 4:
			$table_name = "Deanery";
			$table_id = "Deanery_ID";
			$index_colname = "Diocese_ID";
			$new_table = "Diocese";
			$new_foreign = "Archdiocese_ID";
			break;
		case 5:
			$table_name = "Parish";
			$table_id = "Parish_ID";
			$index_colname = "Deanery_ID";
			$new_table = "Deanery";
			$new_foreign = "Diocese_ID";
			break;
		case 6:
			$table_name = "Outstation";
			$table_id = "Outstation_ID";
			$index_colname = "Parish_ID";
			$new_table = "Parish";
			$new_foreign = "Deanery_ID";
			break;
		default:
			break;
		
	}
	// Selects all the information about the division being elevated
	$sql = "SELECT * FROM `{$table_name}` WHERE `{$table_id}`={$divid} LIMIT 1;";
	$result = mysql_query($sql) or mysql_error();
	// confirm_query($result);
	
	$row = mysql_fetch_row($result);
		$division_name = $row[1];
		echo "Division name is " . $division_name;
		$foreign_key = $row[2];
		echo "<br />Foreign key is " . $foreign_key;
	
	
	mysql_free_result($result);
	
	
	// Selects the foreign key of the divisions's foreign key
	// Example, for an elevated parish it'll get the key of its diocese
	// This is because it will cease to exist in its deanery and has to be saved in the diocese
	$sql = "SELECT * FROM `{$new_table}` WHERE `{$index_colname}`={$foreign_key};";
	$result = mysql_query($sql) or mysql_error();
	// confirm_query($result);
	
	$row = mysql_fetch_array($result);
		$new_foreign_key = $row[$new_foreign];
		echo "<br /> The new foreign key is: " . $new_foreign_key;	
	
	mysql_free_result($result);
	
	
	// This code creates the elevated division
	// In the example above, it creates a deanery with the foreign key being 
	// the diocese which is the foreign key of the deanery it used to belong to
	$sql = "INSERT INTO `{$new_table}` (`Name`, `{$new_foreign}`) VALUES ('{$division_name}', '{$new_foreign_key}');";
	mysql_query($sql, $connection);
	
	// This returns the primary key that was auto-generated upon creation of the elevated division
	$new_primary = mysql_insert_id($connection);
	echo "<br /> The new primary key is: " . $new_primary;
	
	
	// This transfers the division to the newly created elevated division
	// In the example above, the parish is still existing
	// Its foreign key is updated to the newly created deanery
	$sql = "UPDATE `{$table_name}` SET `{$index_colname}` = {$new_primary} WHERE `{$table_id}`={$divid};";
	mysql_query($sql, $connection)  or mysql_error();
	mysql_close($connection);
	
	redirect_to("../elevate_division.php");
	

?>