<?php require_once("includes/session.php"); 
$page = "announcements";
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>
<?php require("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php include("includes/announcement_bar.php");?>
<?php 
include("includes/header.php");?>
<?php include("includes/sidebar.php");

if ($_SESSION['Post_ID'] == 5 || $_SESSION['Post_ID'] == 6 || $_SESSION['Post_ID'] == 7 || $_SESSION['Post_ID'] == 8){
	
}
else{
	redirect_to("homepage.php");
}


?>

<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">
<h2>Announcements</h2>
<p>Welcome to the announcements page. Once you enter announcements, click on the submit. </p>

<form name='Outstation' action='functions/save_announcements.php' method='post'>
Outstation Announcements: &nbsp;
<input type='text' name='Announcement'  />
<input type='hidden' name='Table' value='Outstation'  />
<input type='hidden' name='Table_ID' value='Outstation_ID'  />
<?php	
$outstation_id = $_SESSION['Outstation_ID'];
echo "<input type='hidden' name='Division' value='{$outstation_id}'  />";
?>
&nbsp;
<input type='submit' value='submit' /></form>
<br />


<?php
// Gets the rank of the Secretary
$rank = $_SESSION['Division_ID'];

// If he has parish clearance, allow the secretary to post the announcement for the parish
if($rank < 6){
	echo "<form name='parish' action='functions/save_announcements.php' method='post'>";
	echo "Parish Announcements: &nbsp;";
	echo "<input type='text' name='Announcement'  />";
	echo "<input type='hidden' name='Table' value='Parish'  />";
	echo "<input type='hidden' name='Table_ID' value='Parish_ID'  />";
	$parish_id = $_SESSION['Parish_ID'];
	echo "<input type='hidden' name='Division' value='{$parish_id}'  />";
	echo "&nbsp; <input type='submit' value='submit' /></form>";
	echo "<br />";
	echo "<br />";
	
}


// If he has deanery clearance, allow the secretary to post the announcement for the deanery
if($rank < 5){
	echo "<form name='deanery' action='functions/save_announcements.php' method='post'>";
	echo "Deanery Announcements: &nbsp;";
	echo "<input type='text' name='Announcement'  />";
	echo "<input type='hidden' name='Table' value='Deanery'  />";
	echo "<input type='hidden' name='Table_ID' value='Deanery_ID'  />";
	$deanery_id = $_SESSION['Deanery_ID'];
	echo "<input type='hidden' name='Division' value='{$deanery_id}'  />";
	echo "&nbsp; <input type='submit' value='submit' /></form>";
	echo "<br />";
	echo "<br />";
	
}

// If he has diocese clearance, allow the secretary to post the announcement for the diocese
if($rank < 4){
	echo "<form name='diocese' action='functions/save_announcements.php' method='post'>";
	echo "Diocese Announcements: &nbsp;";
	echo "<input type='text' name='Announcement'  />";
	echo "<input type='hidden' name='Table' value='Diocese'  />";
	echo "<input type='hidden' name='Table_ID' value='Diocese_ID'  />";
	$diocese_id = $_SESSION['Diocese_ID'];
	echo "<input type='hidden' name='Division' value='{$diocese_id}'  />";
	echo "&nbsp; <input type='submit' value='submit' /></form>";
	echo "<br />";
	echo "<br />";
	
}

// If he has Archdiocese clearance, allow the secretary to post the announcement for the Archdiocese
if($rank < 3){
	echo "<form name='archdiocese' action='functions/save_announcements.php' method='post'>";
	echo "Archdiocese Announcements: &nbsp;";
	echo "<input type='text' name='Announcement'  />";
	echo "<input type='hidden' name='Table_ID' value='Archdiocese_ID'  />";
	$archdiocese_id = $_SESSION['Archdiocese_ID'];
	echo "<input type='hidden' name='Division' value='{$parish_id}'  />";
	echo "&nbsp; <input type='submit' value='submit' /></form>";
	echo "<br />";
	echo "<br />";
	
}

// If he has parish clearance, allow the secretary to post the announcement for the parish
if($rank < 2){
	echo "<form name='Nation' action='functions/save_announcements.php' method='post'>";
	echo "Nation Announcements: &nbsp;";
	echo "<input type='text' name='Announcement'  />";
	echo "<input type='hidden' name='Table' value='Nation'  />";
	echo "<input type='hidden' name='Table_ID' value='Nation_ID'  />";
	
	echo "<input type='hidden' name='Division' value=1  />";
	echo "&nbsp; <input type='submit' value='submit' /></form>";
	echo "<br />";
	echo "<br />";
	echo "<br />";
}
?>



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

