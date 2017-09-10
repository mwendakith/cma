<?php require_once("includes/session.php"); 
$page = "manual_polls";
 error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>
<?php require("includes/connection.php");?>
<?php
 include("includes/functions.php");
if($_SESSION['Post_ID'] == 2 || $_SESSION['Post_ID'] == 3 || $_SESSION['Post_ID'] == 4){

}
else{
	redirect_to("homepage.php");	
}

?>
<?php include("includes/announcement_bar.php");?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<div class="middle">


<?php
	echo $sidebar;
?>



<div class="content">
<h2>Manual Polls</h2>
<p>Welcome to the page where you can register officials who have been elected manually.</p>
<br />
Select the division: 
<?php
	echo "<select onchange='get_list(this.value)'>";
	echo "<option value=''>--Select the division--</option>";
	echo "<option value=6>Outstation</option>";
	if ($_SESSION['Division_ID'] < 6){
		echo "<option value=5>Parish</option>";
	}
	if ($_SESSION['Division_ID'] < 5){
		echo "<option value=4>Deanery</option>";
	}
	if ($_SESSION['Division_ID'] < 4){
		echo "<option value=3>Diocese</option>";
	}
	if ($_SESSION['Division_ID'] < 3){
		echo "<option value=2>Archdiocese</option>";
	}
	if ($_SESSION['Division_ID'] < 2){
		echo "<option value=1>Nation</option>";
	}
	echo "</select>";


?>


<form action='functions/save_officials.php' method='post' name='manual_voting' id='men'>

</form>
</div>

<div class="sidebar2">
     <?php echo $announcement_string; ?>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

<script >
function get_list(division){
	
	
	
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("men").innerHTML=xmlhttp.responseText;
	
	
    }
  }
xmlhttp.open("GET","functions/manual_voting.php?level="+division,true);
xmlhttp.send();
	
}

</script>

<?php 
include("includes/footer.php");

?>

