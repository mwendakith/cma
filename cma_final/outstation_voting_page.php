<?php 
require_once("includes/session.php");?>
<?php
$page = "outstation_voting_page";?>
<?php
include("includes/header.php");
?>
<?php require("includes/connection.php");?>
<?php include("includes/announcement_bar.php");?>
<?php 
include("includes/voting_list.php");
include("includes/sidebar.php");

?>
<div class="middle">
<?php
	echo $sidebar;
	$outstation = $_SESSION['Outstation_ID'];
	$parish = $_SESSION['Parish_ID'];
	$deanery = $_SESSION['Deanery_ID'];
	$diocese = $_SESSION['Diocese_ID'];
	$archdiocese = $_SESSION['Archdiocese_ID'];
?>

<div class="content">
<h2>VOTING PAGE</h2>
<p>Welcome to the voting page. Please vote for your preferred candidate in the following categories. Submit a choice for all categories. </p>


<form method="post" action="functions/voting.php">

<!-- Chairman -->
<label for="Chairman">Chairman:  </label>
<select name="Chairman">
<?php voting_list($outstation, 2); ?>
</select>

<br />
<!-- Vice-Chair -->
<label for="Vice_Chair"> First Vice Chair: </label>
<select name="Vice_Chair">
<?php voting_list($outstation, 3); ?>
</select>

<br />
<!-- Second Vice-Chair -->
<label for="Second_Vice_Chair"> Assistant First Vice Chair: </label>
<select name="Second_Vice_Chair">
<?php voting_list($outstation, 4); ?>
</select>

<br />
<!-- Secretary -->
<label for="Secretary"> Secretary: </label>
<select name="Secretary">
<?php voting_list($outstation, 5); ?>
</select>

<br />
<!-- Assistant Secretary -->
<label for="Ass_Secretary"> Assistant Secretary: </label>
<select name="Ass_Secretary">
<?php voting_list($outstation, 6); ?>
</select>

<br />
<!-- Organising Secretary -->
<label for="Org_Secretary"> Orgainising Secretary: </label>
<select name="Org_Secretary">
<?php voting_list($outstation, 7); ?>
</select>

<br />
<!-- Organising Secretary -->
<label for="Ass_Org_Secretary"> Assistant Orgainising Secretary: </label>
<select name="Ass_Org_Secretary">
<?php voting_list($outstation, 8); ?>
</select>

<br />
<!-- Vice-Chair -->
<label for="Treasurer"> Treasurer: </label>
<select name="Treasurer">
<?php voting_list($outstation, 9); ?>
</select>

</form>
</div>

<div class="sidebar2">
     <?php echo $announcement_string; ?>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

<?php 
include("includes/footer.php");

?>

