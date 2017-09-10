<?php 
error_reporting(E_PARSE); 
require_once("includes/session.php"); 
$page = "homepage";
?>
<?php require("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php include("includes/announcement_bar.php");?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

<div class="middle">

<?php
	echo $sidebar;
?>

<div class="content">
	<h2>Homepage</h2>
    <p>You have successfully logged in as <?php echo $username; ?></p>
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

