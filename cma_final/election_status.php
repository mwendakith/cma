<?php require_once("includes/session.php"); 
$page = "election_status";

?>
<?php require("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php include("includes/announcement_bar.php");?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");

if($_SESSION['Post_ID'] == 2 || $_SESSION['Post_ID'] == 3 || $_SESSION['Post_ID'] == 4){

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
<h2>Election Status</h2>
<p>Welcome to the election status page. <br /><br /></p>


<form name='Outstation' action='functions/change_election_status.php' method='post'>
Outstation status: <br />

<select name="status" onchange='get_out(this.value)' >
<option value=''>--Select a status--</option>
<option value=1 >Polling Period</option>
<option value=2 >Nomination Period</option>
</select>
<input type='hidden' name='division' value=6  />
&nbsp;
<input type='submit' value='Submit' />
</form>
<br />
<br />

<?php
// Checks the level of the chairman and thus which level of election he may start
$rank = $_SESSION['Division_ID'];
if($rank < 6){
	echo "Parish status: &nbsp;";
	echo "<form name='Parish' action='functions/change_election_status.php' method='post'>";
	echo "<select name='parish_status' onchange='get_par(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1>Polling Period</option>" . "<option value=2>Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

if($rank < 5){
	echo "Deanery status: &nbsp;";
	echo "<form name='Deanery' action='functions/change_election_status.php' method='post'>";
echo "<select name='deanery_status' onchange='get_dean(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1>Polling Period</option>" . "<option value=2 >Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

if($rank < 4){
	echo "Diocese status: &nbsp;";
	echo "<form name='Diocese' action='functions/change_election_status.php' method='post'>";
	echo "<select name='diocese_status' onchange='get_dioc(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1 >Polling Period</option>" . "<option value=2 >Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

if($rank < 3){
	echo "Archdiocese status: &nbsp;";
	echo "<form name='Diocese' action='functions/change_election_status.php' method='post'>";
	echo "<select name='archdiocese_status' onchange='get_arc(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1 >Polling Period</option>" . "<option value=2 >Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

if($rank < 2){
	echo "Nation status: &nbsp;";
	echo "<select name='nation_status' onchange='get_nat(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1 >Polling Period</option>" . "<option value=2 >Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

?>



<p id="respond"></p>

</div>

<div class="sidebar2">
     <?php echo $announcement_string; ?>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

<script>
// Receives the response from the outstation select tag
function get_out(st){
	
	 if(st == 3){
		set_list(6);
	}
}

// Receives the response from the parish select tag
function get_par(st){
	 if(st == 3){
		set_list(5);
	}
}

// Receives the response from the deanery select tag
function get_dean(st){
	if(st == 3){
		set_list(4);
	}
}

// Receives the response from the diocese select tag
function get_dioc(st){
	 if(st == 3){
		set_list(3);
	}
}

// Receives the response from the archdiocese select tag
function get_arc(st){
	 if(st == 3){
		set_list(2);
	}
}

// Receives the response from the nation select tag
function get_nat(st){
	 if(st == 3){
		set_list(1);
	}
}

</script>
<script>
/*
function set_voting(division){
	
	var status = 1;
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
    document.getElementById("respond").innerHTML=xmlhttp.responseText;
	
	
    }
  }
xmlhttp.open("GET","functions/change_election_status.php?status="+status+"&division"+division,true);
xmlhttp.send();
}
*/
</script>
<script>
/*
function set_nomination(division){
	var status = 2;
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
    document.getElementById("respond").innerHTML=xmlhttp.responseText;
	
	
    }
  }
xmlhttp.open("GET","functions/change_election_status.php?status="+status+"&division"+division,true);
xmlhttp.send();
}
*/

</script>
<script>
/*
function set_list(division){
	var level = division;
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
    document.getElementById("respond").innerHTML=xmlhttp.responseText;
	
	
    }
  }
xmlhttp.open("GET","functions/manual_voting.php?level"+level,true);
xmlhttp.send();
	
}
*/
</script>

<?php 
include("includes/footer.php");

?>

