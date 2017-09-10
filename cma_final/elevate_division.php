<?php 
require_once("includes/session.php"); 
$page = "elevate_division";
require("includes/connection.php");
include("includes/header.php");
include("includes/sidebar.php");
include("includes/announcement_bar.php");
 include("includes/functions.php");
 
if($_SESSION['Post_ID'] != 1){
	redirect_to("homepage.php");
}

?>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">
<h2>Elevate Division</h2>
<p>Welcome to the page where you can elevate the status of the division.</p>

<form action="functions/upgrade_division.php" method="post" name="division_form">

<label for="Division_level">Select the division you are making</label>
<select name="Division_level" id="div_level" onchange="get_name(this.value)">
<option value=""></option>

<option value=3>Diocese</option>
<option value=4>Deanery</option>
<option value=5>Parish</option>
<option value=6>Outstation</option>
</select>
<br />
<br />


<label for="Division_id">Select the division</label>
<select name="Division_id" id="suggestions">

</select>
<br />
<br />

<input type="submit"  value="Elevate" />


</form>


</div>



<div class="sidebar2">
    <?php echo $announcement_string; ?>
    
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>


<script >
function get_name(variable){
	
	var table_name;
	
	
	if(variable == 3){
		table_name = "diocese";
	}
	
	else if(variable == 4){
		table_name = "deanery";
		
	}
	
	else if(variable == 5){
		table_name = "parish";
	}
	
	else if (variable == 6){
		table_name = "outstation";
	}
	
	
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
    document.getElementById("suggestions").innerHTML=xmlhttp.responseText;
	
	
    }
  }
xmlhttp.open("GET","functions/get_option.php?table="+table_name,true);
xmlhttp.send();
	
}

</script>

<?php 
include("includes/footer.php");

?>

