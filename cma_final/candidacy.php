<?php require_once("includes/session.php"); 
$page = "candidacy";
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
<h2>Candidacy</h2>
<p> 
<?php
	$post = $_SESSION['Post_ID'];
	$division = $_SESSION['Division_ID'];
	
	if($post == 10){
		first_time();

	}
	
	if ($post > 1 && $post < 9){
		promotion($post, $division);
		
	}

	?> </p>
</div>

<div class="sidebar2">
    <?php echo $announcement_string; ?>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

	<?php
	// This will output the page for a first time candidate
		function first_time(){
			$oid = $_SESSION['Outstation_ID'];
			$sql = "SELECT * FROM `Outstation` WHERE `Outstation_ID`={$oid}";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			
			if($row['Election_Status'] == 2){
				$str = "Welcome to the candidacy page. Here, you can submit your candidacy for the position of your choice. ";
				$str .= "<br /><br />";
				$str .= "<form action='functions/count.php' method='post' name='first_time'>";
				$str .= "<select name='post_level'>";
				$str .= "<option value=''>--Select a post--</option>";
				$str .= "<option value=2>Chairman</option> ";
				$str .= "<option value=3>Vice Chairman</option> ";
				$str .= "<option value=4>Assistant Vice Chairman</option> ";
				$str .= "<option value=5>Secretary</option> ";
				$str .= "<option value=6>Assistant Secretary</option> ";
				$str .= "<option value=7>Organising Secretary</option> ";
				$str .= "<option value=8>Assistant Organising Secretary</option> ";
				$str .= "<option value=9>Treasurer</option> ";
				$str .= "</select></form>";
				
				echo $str;
			}
			else{
				echo "The nomination stage is not active. Consult with the chairman on when it will open.";	
				
			}
		}
	// This function is for candidates who wish to retain their post or vie for a higher level
	function promotion($post, $division){
		
		echo "You may submit your candidacy on this page.";
		// Checks the level of the candidate and thus which level he may submit his candidacy
		echo "<br /> <br /> Outstation candidacy.";
		echo "<input type='button' onclick='candidate(6)' value='Submit Candidacy'  /> &nbsp;";
		echo "<input type='button' onclick='uncandidate(6)' value='Unsubmit Candidacy'  /><br />";
		
		$rank = $_SESSION['Division_ID'];
		if($rank < 6){
			echo "<br /> Parish Candidacy.";
			echo "<input type='button' onclick='candidate(5)' value='Submit Candidacy'  /> &nbsp;";
			echo "<input type='button' onclick='uncandidate(5)' value='Unsubmit Candidacy'  /><br />";
		}

	if($rank < 5){
		echo "<br /> Deanery Candidacy.";
		echo "<input type='button' onclick='candidate(4)' value='Submit Candidacy'  /> &nbsp;";
		echo "<input type='button' onclick='uncandidate(4)' value='Unsubmit Candidacy'  /><br />";
	}

	if($rank < 4){
		echo "<br /> Diocese Candidacy.";
		echo "<input type='button' onclick='candidate(3)' value='Submit Candidacy'  /> &nbsp;";
		echo "<input type='button' onclick='uncandidate(3)' value='Unsubmit Candidacy'  /><br />";
	}

	if($rank < 3){
		echo "<br /> Archdiocese Canidacy.";
		echo "<input type='button' onclick='candidate(2)' value='Submit Candidacy' /> &nbsp;";
		echo "<input type='button' onclick='uncandidate(2)' value='Unsubmit Candidacy'  /><br />";
	}

	if($rank < 2){
		echo "<br /> Nation Candidacy.";
		echo "<input type='button' onclick='candidate(1)' value='Submit Candidacy' /> &nbsp;";
		echo "<input type='button' onclick='uncandidate(1)' value='Unsubmit Candidacy' /><br />";
	}
			
	}
	
	
	?>
    <br />
<br />

    <p id='suggestions'></p>
    
<script>
	// The value received is the division where the candidate has submitted his candidacy
	function candidate(kura){
		 
			
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
xmlhttp.open("GET","functions/register_candidacy.php?divid="+kura,true);
xmlhttp.send();
	
}	
		
		
	// The value received is the division where the member is recanting his candidacy
	function uncandidate(unkura){
		 
			
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
xmlhttp.open("GET","functions/unregister_candidacy.php?divid="+unkura,true);
xmlhttp.send();
	
}	
	
	

</script>

	
<?php 
include("includes/footer.php");

?>

