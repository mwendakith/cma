<?php require("../includes/connection.php"); ?>
<?php include("../includes/functions.php");?>

<?php
// This retrieves the name of the table 
$table = $_GET['table'];

	$sql = "SELECT * ";
	$sql .= "FROM " . $table ;
	$sql .= " ORDER BY Name ASC; ";
	
	$result = mysql_query($sql);
	
	confirm_query($result);
	
	echo "<option value=''>Choose a place below </option>";
	while($row = mysql_fetch_array($result)){
		echo "<option value=" . $row[0] . ">" . $row['Name'] . "</option>";
	
	}



?>