<?php 
 require_once("includes/session.php");
require("includes/connection.php");?>
<?php include("includes/announcement_bar.php");?>
<?php 
$page = "Officials_List";
include("includes/header.php");
include("includes/sidebar.php");
include("includes/functions.php");
?>

<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">
<h2>Select the level where you want to view list of officials. Click on the member to view the profile.</h2>
<br />
<br />

<p>
<select name='Division' onchange="">
<option value=""></option>
<option value=1>Nation</option>
<option value=2>Archdiocese</option>
<option value=3>Diocese</option>
<option value=4>Deanery</option>
<option value=5>Parish</option>
<option value=6>Outstation</option>
</select>
<br />
<br />

<table id="officials_table"></table>

</p>
</div>

<div class="sidebar2">
    <?php echo $announcement_string; ?>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

<script>
	function get_table(division){
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
			document.getElementById("officials_table").innerHTML=xmlhttp.responseText;
			
			
			}
  }
xmlhttp.open("GET","functions/get_officials_table.php?division="+division,true);
xmlhttp.send();
	}
</script>


<?php 
include("includes/footer.php");

?>

