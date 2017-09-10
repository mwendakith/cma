<?php
	//Function to generate a list of members and to count them
	
	function outstation_count($outstation){
		$out = $_SESSION['outstation'];
		$sql = "SELECT COUNT(*) AS mycount ";
		$sql .="FROM Members ";
		$sql .="WHERE Outstation_ID = '{$out}' ";
		
	
	}




?>