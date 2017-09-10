<?php require_once("includes/session.php"); ?>
<?php require("includes/connection.php");?>
<?php include("includes/functions.php");?>
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
    <h3>Sidebar2</h3>
    <p>Stuff goes here</p>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

<?php 
include("includes/footer.php");

?>

