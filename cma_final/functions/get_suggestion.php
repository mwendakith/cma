<?php require("../includes/connection.php"); ?>
<?php include("../includes/functions.php");?>

<?php
	//This get the division level of the foreign key
	// Once user decides to register a parish for example, divid="Deanery"
	// This allows for the selection of the table
	// $y will be deanery_id thus allowing us to get the id and set it as the value for the option
	// the output will be the name of the deanery in this example
	$x = $_GET['divid'];	
	
	
	//This gets all the details of the foreign key and sorts them
	$sql = "SELECT * ";
	$sql .= "FROM " . $x ;
	$sql .= " ORDER BY Name ASC; ";
	
	$result = mysql_query($sql);
	
	confirm_query($result);
	
	//This outputs the name of the foreign key as the option
	//It sets the value of the foreign key as the id of the foreign key
	//Sets the first option as blank with a null value
	echo "<option value=''> </option>";
	while($row = mysql_fetch_array($result)){
		echo "<option value=" . $row[0] . ">" . $row['Name'] . "</option>";
	
	}
	
	


?>