
<?php include("includes/session.php");
	require("includes/connection.php");
?>
<?php include("includes/announcement_bar.php");?>
<?php 
	$page = "view_members";
	
	  
		
	

	
	
	$selquery = "SELECT * FROM members, next_of_kin, outstation WHERE National_ID = {$_GET['nid']} AND members.NOK_ID = next_of_kin.NOK_ID AND outstation.Outstation_ID = members.Outstation_ID";
	$rs = mysql_query($selquery, $connection);
	$member = mysql_fetch_array($rs);
	
	
	
	include("includes/header.php");
?>
<?php include("includes/sidebar.php");?>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">

        <h2>View Member</h2>
        <?php
		echo "<table class=\"viewmemtable\" border=\"1\">
		<tr><th>Cma No</th><td>{$member['cma_no']}</td><td rowspan=\"12\"><img src=\"images/profile_images/{$member['Image']}\" width=\"194\" height=\"259\" /></td></tr>
		<tr><th>First Name</th><td>{$member['First_Name']}</td></tr>
		<tr><th>Other Name</th><td>{$member['Other_Names']}</td></tr>
		<tr><th>Surname</th><td>{$member['Surname']}</td></tr>
		<tr><th>National Id</th><td>{$member['National_ID']}</td></tr>
		<tr><th>Mobile No</th><td>{$member['Mobile_No']}</td></tr>
		<tr><th>House No</th><td>{$member['House_No']}</td></tr>
		<tr><th>Small Christian Community</th><td>{$member['SCC']}</td></tr>
		<tr><th>Nok_Name</th><td>{$member['NOK_Name']}</td></tr>
		<tr><th>Nok_Number</th><td>{$member['NOK_Number']}</td></tr>
		<tr><th>Outstation</th><td>{$member['Name']}</td></tr>
		<tr><th>Date Of Joining</th><td>{$member['Joining_Date']}</td></tr></table>";
		
		if($_SESSION['Post_ID'] == 5 || $_SESSION['Post_ID'] == 6 || $_SESSION['Post_ID'] == 1){
		echo "<a style=\"color: red;\" href=\"update_members.php?nid={$member['National_ID']}\">Update</a><br/>";
		}
		echo "<a style=\"color: red;\" href=\"view_all_members.php?\">Back To View All Members</a>";
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

