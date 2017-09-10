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
        <?php
			echo date("Y-m-d");
		
		?>
        
    </div>
    
    <div class="sidebar2">
        <h3>Sidebar2</h3>
        <p>Stuff goes here</p>
    </div>
        
</div>

<?php 
include("includes/footer.php");

?>

