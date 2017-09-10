<?php 
require_once("includes/session.php"); 
$page = "new_division";
require("includes/connection.php");
include("includes/header.php");
include("includes/sidebar.php");
include("includes/announcement_bar.php");

?>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">
<h2>Division Registration</h2>
<p>Welcome to the page where you can register new divisions. </p>

<form action="functions/register_division.php" method="post" name="division_form">

<label for="Division_level">Select the division you are making</label>
<select name="Division_level" id="div_level" onchange="get_key(this.value)">
<option value=""></option>
<option value=2>Archdiocese</option>
<option value=3>Diocese</option>
<option value=4>Deanery</option>
<option value=5>Parish</option>
<option value=6>Outstation</option>
</select>

<br  />
<br  />

<label for="Division_name">Enter the name of the division.</label>
<input type="text" name="Division_name"  />

<br />
<br />

<label for="key">Select the division</label>
<select name="key" id="suggestions">

</select>
<br />
<br />

<input type="submit"  />


</form>


</div>


<div class="sidebar2">
    <?php echo $announcement_string; ?>
    
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>




<script >
function get_key(variable){
	
	var foreign_key;
	if(variable == 2){
		foreign_key = "nation";
	}
	
	else if(variable == 3){
		foreign_key = "archdiocese";
	}
	
	else if(variable == 4){
		foreign_key = "diocese";
		
	}
	
	else if(variable == 5){
		foreign_key = "deanery";
	}
	
	else if (variable == 6){
		foreign_key = "parish";
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
xmlhttp.open("GET","functions/get_suggestion.php?divid="+foreign_key,true);
xmlhttp.send();
	
}

</script>


<?php 
include("includes/footer.php");

?>

