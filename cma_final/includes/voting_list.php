<?php
function voting_list($list_id, $post){
	

// Selects details of candidates
// The nested query gets the national id of the candidates
$sql = "SELECT * ";
$sql .= "FROM `Members` ";
$sql .= "WHERE `National_ID` = (";
$sql .= "SELECT `National_ID` ";
$sql .= "FROM `Election` ";
$sql .= "WHERE `List_ID` =  '{$list_id}' ";
$sql .= "AND `Post_ID` = '{$post}' ";


$result = mysqli_query($sql);
// Iterates through the list of candidates
// Each candidate becomes an option in the select tag
// Sets the value of the option as the National ID
// The choice available for the user are the names of the candidates 
while ($row = mysqli_fetch_array($result)){
	
	echo "<option value=" . $row['National_ID'] . "> " . $row['First_name'] . "&nbsp;" . $row['Other_Names'] . "&nbsp;" . $row['Last_Name'] . "</option>";
}
}
?>