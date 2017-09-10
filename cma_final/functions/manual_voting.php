
<?php
require_once("../includes/session.php");
 require("../includes/connection.php");?>
<?php include("../includes/functions.php");?>


<?php



// Selects the people who qualify to be chosen 
$division = $_GET['level'];
$area;
$sql;

$chair_sql;
$vice_chair_sql;
$ass_vice_chair_sql;
$sec_sql;
$ass_sec_sql;
$org_sec_sql;
$ass_org_sec_sql;
$treasurer_sql;

//echo "<form action='save_officials.php' method='post' name='manual_voting'>" . "Choose the candidates that have been elected.<br /><br />";
// Switches 
switch($division){
	case 1:
		// Area get the id of the division
		$area = 1;
		//Below are the sql statements required to populate the select tags with viable candidates

		$chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=2";
		$vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=3";
		$ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=4";
		$sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=5";
		$ass_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=6";
		$org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=7";
		$ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=8";
		$treasurer_sql = "SELECT * FROM `Members` WHERE `Division_ID`<3 AND `Post_ID`=9";
		break;
		
		
		
	case 2:
		$area = $_SESSION['Archdiocese_ID'];
		//Below are the sql statements required to populate the select tags with viable candidates

		$chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=2 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`=(SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";
		
		
		$vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=3 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`=(SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";
		
		
		$ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=4 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`=(SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";
		
		
		$sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=5 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`=(SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";
		
		
		$ass_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=6 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`=(SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";
		
		
		$org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=7 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`=(SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";
		
		
		$ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=8 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`=(SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";
		
		
		$treasurer_sql = "SELECT * FROM `Members` WHERE `Division_ID`<4 AND `Post_ID`=9 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`=(SELECT `Diocese_ID` FROM `Diocese` WHERE `Archdiocese_ID`='{$area}'))))";
		
		break;
	
	
	
		
	case 3:
		$area = $_SESSION['Diocese_ID'];
		//Below are the sql statements required to populate the select tags with viable candidates

		$chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=2 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";
		
		$vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=3 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";
		
		$ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=4 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";
		
		$sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=5 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";
		
		$ass_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=6 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";
		
		$org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=7 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";
		
		$ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=8 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";
		
		$treasurer_sql = "SELECT * FROM `Members` WHERE `Division_ID`<5 AND `Post_ID`=9 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`=(SELECT `Deanery_ID` FROM `Deanery` WHERE `Diocese_ID`='{$area}')))";
		
		break;
		
		
		
		
	case 4:
		$area = $_SESSION['Deanery_ID'];
		//Below are the sql statements required to populate the select tags with viable candidates

		$chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=2 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";
		
		$vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=3 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";
		
		$ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=4 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";
		
		$sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=5 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";
		
		$ass_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=6 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";
		
		$org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=7 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";
		
		$ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=8 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";
		
		$treasurer_sql = "SELECT * FROM `Members` WHERE `Division_ID`<6 AND `Post_ID`=9 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`=(SELECT `Parish_ID` FROM `Parish` WHERE `Deanery_ID`='{$area}'))";
		
		break;
		
		
		
		
	case 5:
		$area = $_SESSION['Parish_ID'];
		//Below are the sql statements required to populate the select tags with viable candidates

		$chair_sql = "SELECT * FROM `Members` WHERE `Post_ID`=2 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";
		
		$vice_chair_sql = "SELECT * FROM `Members` WHERE `Post_ID`=3 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";
		
		$ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Post_ID`=4 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";
		
		$sec_sql = "SELECT * FROM `Members` WHERE `Post_ID`=5 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";
		
		$ass_sec_sql = "SELECT * FROM `Members` WHERE `Post_ID`=6 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";
		
		$org_sec_sql = "SELECT * FROM `Members` WHERE `Post_ID`=7 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";
		
		$ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Post_ID`=8 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";
		
		$treasurer_sql = "SELECT * FROM `Members` WHERE `Post_ID`=9 AND `Outstation_ID`= (SELECT `Outstation_ID` FROM `Outstation` WHERE `Parish_ID`='{$area}')";
		break;
		
		
		
		
	case 6:
		$area = $_SESSION['Outstation_ID'];
		//Below are the sql statements required to populate the select tags with viable candidates

		$chair_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
		$vice_chair_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
		$ass_vice_chair_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
		$sec_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
		$ass_sec_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
		$org_sec_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
		$ass_org_sec_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
		$treasurer_sql = "SELECT * FROM `Members` WHERE `Outstation_ID`='{$area}'";
		break;
		
	default:
		break;				
}




//Select tag for the Chairman
echo "Chairman &nbsp;";
echo "<select name='Chairman'>";
echo "<option value=''></option>";
$result = mysql_query($chair_sql);
while($row = mysql_fetch_array($result)){
	echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
}
mysql_free_result($result);

echo "</select>";


// Select tag for the Vice Chair
echo "<br />Vice Chairman &nbsp;"; 
echo "<select name='Vice'>";
echo "<option value=''></option>";
$result = mysql_query($vice_chair_sql);
while($row = mysql_fetch_array($result)){
	echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
}
mysql_free_result($result);

echo "</select>";


// Select tag for the Assistant Vice Chair -->
echo "<br />Assistant Vice Chairman &nbsp;"; 
echo "<select name='Ass_Vice'>";
echo "<option value=''></option>";
$result = mysql_query($ass_vice_chair_sql);
while($row = mysql_fetch_array($result)){
	echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
}
mysql_free_result($result);

echo "</select>";


// Select tag for the Secretary -->
echo "<br />Secretary &nbsp;";
echo "<select name='Sec'>";
echo "<option value=''></option>";
$result = mysql_query($sec_sql);
while($row = mysql_fetch_array($result)){
	echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
}
mysql_free_result($result);

echo "</select>";


// Select tag for the Assistant Secretary -->
echo "<br />Assistant Secretary &nbsp;";
echo "<select name='Ass_Sec'>";
echo "<option value=''></option>";
$result = mysql_query($ass_sec_sql);
while($row = mysql_fetch_array($result)){
	echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
}
mysql_free_result($result);

echo "</select>";


// Select tag for the Organising Secretary -->
echo "<br />Organising Secretary &nbsp;";
echo "<select name='Org_Sec'>";
echo "<option value=''></option>";
$result = mysql_query($org_sec_sql);
while($row = mysql_fetch_array($result)){
	echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
}
mysql_free_result($result);

echo "</select>";


// Select tag for the Assistant Organising Secretary -->
echo "<br />Assistant Organising Secretary &nbsp;";
echo "<select name='Ass_Org'>";
echo "<option value=''></option>";
$result = mysql_query($ass_org_sec_sql);
while($row = mysql_fetch_array($result)){
	echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
}
mysql_free_result($result);

echo "</select>";


// Select tag for the Treasurer
echo "<br />Treasurer &nbsp;";
echo "<select name='Treasurer'>";
echo "<option value=''></option>";
$result = mysql_query($treasurer_sql);
while($row = mysql_fetch_array($result)){
	echo "<option value='" . $row['National_ID'] . "'> {$row['Surname']} &nbsp; {$row['First_Name']} </option>";
}
mysql_free_result($result);


echo "</select> <br />";
echo "<input name='Division' type='hidden' value='" . $division . "' /><br /><br />";
echo "<input name='Division_id' type='hidden' value='" . $area . "' /><br /><br />";

echo "<input type='submit' value='Submit'/>";
// echo "</form>";
?>