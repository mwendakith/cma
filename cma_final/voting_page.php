<?php 
require_once("includes/session.php");?>
<?php
$page = "voting_page";?>
<?php
include("includes/header.php");
?>
<?php 
include("includes/voting_list.php");
include("includes/sidebar.php");

?>
<?php include("includes/announcement_bar.php");?>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">
<h2>VOTING PAGE</h2>
<p>Welcome to the voting page. Please vote for your preferred candidate in the following categories. Submit a choice for all categories. </p>
<form method="post" action="new_member.php">

<!-- Chairman -->
<label for="Chairman">Chairman:  </label>
<select name="Chairman">
<?php
// Selects details of candidates
// The nested query gets the national id of the candidates
$sql = "SELECT * ";
$sql .= "FROM `Members` ";
$sql .= "WHERE `National_ID` = (";
$sql .= "SELECT `National_ID` ";
$sql .= "FROM `Election` ";
$sql .= "WHERE `List_ID` =  '{}' ";
$sql .= "AND `Post_ID` = '{}' ";
$sql .= "AND `` = '{}'); ";

$result = mysqli_query($connection, $sql);
// Iterates through the list of candidates
// Each candidate becomes an option in the select tag
// Sets the value of the option as the National ID
// The choice available for the user are the names of the candidates 
while ($row = mysqli_fetch_array($result)){
	
	echo "<option value=" . $row['National_ID'] . "> " . $row['First_name'] . "&nbsp;" . $row['Other_Names'] . "&nbsp;" . $row['Last_Name'] . "</option>";
}
?>
</select>

<br />
<!-- Vice-Chair -->
<label for="Vice_Chair"> First Vice Chair: </label>
<select name="Vice_Chair">
<?php voting_list(); ?>
</select>

<br />
<!-- Second Vice-Chair -->
<label for="Second_Vice_Chair"> Assistant First Vice Chair: </label>
<select name="Second_Vice_Chair">
<?php voting_list(); ?>
</select>

<br />
<!-- Secretary -->
<label for="Secretary"> Secretary: </label>
<select name="Secretary">
<?php voting_list(); ?>
</select>

<br />
<!-- Assistant Secretary -->
<label for="Ass_Secretary"> Assistant Secretary: </label>
<select name="Ass_Secretary">
<?php voting_list(); ?>
</select>

<br />
<!-- Organising Secretary -->
<label for="Org_Secretary"> Orgainising Secretary: </label>
<select name="Org_Secretary">
<?php voting_list(); ?>
</select>

<br />
<!-- Organising Secretary -->
<label for="Ass_Org_Secretary"> Assistant Orgainising Secretary: </label>
<select name="Ass_Org_Secretary">
<?php voting_list(); ?>
</select>

<br />
<!-- Vice-Chair -->
<label for="Treasurer"> Treasurer: </label>
<select name="Treasurer">
<?php voting_list(); ?>
</select>

</form>
</div>


<div class="sidebar2">
    <?php echo $announcement_string; ?>
    <p>Stuff goes here</p>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>


<?php 
include("includes/footer.php");

?>

