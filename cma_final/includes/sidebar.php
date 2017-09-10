<?php

if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
	}else{
		$username = "";	
	}
	
	//get details of user logged in and check post in order to generate sidebar navigation menu
	$sidebar = "<div class=\"sidebar1\"><ul>";
	
	// if user is administrator
	if($_SESSION['Post_ID'] == 1){
		//sidebar markup	
		$sidebar .= "<li><a href=\"new_division.php\" ";
		if($page == "new_division"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">NEW DIVISION</a></li>";
		
		
		$sidebar .= "<li><a href=\"elevate_division.php\" ";
		if($page == "elevate_division"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">ELEVATE DIVISION</a></li>";
		
		
		$sidebar .= "<li><a href=\"member_registration.php\" ";
		if($page == "registration"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">REGISTRATION</a></li>";
		
	}
	
	
	else{
	// if user is chairman or the vice or the assistant
	if($_SESSION['Post_ID'] == 2 || $_SESSION['Post_ID'] == 3 || $_SESSION['Post_ID'] == 4){
		//sidebar markup	
		$sidebar .= "<li><a href=\"election_status.php\" ";
		if($page == "election_status"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">ELECTION STATUS</a></li>";
		

		
		
		$sidebar .= "<li><a href=\"manual_polls.php\" ";
		if($page == "manual_polls"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">MANUAL POLLS</a></li>";
		
		
		
	}
	
	
	
	
	//if user is secretary or the assistant
	if($_SESSION['Post_ID'] == 5 || $_SESSION['Post_ID'] == 6){
		//sidebar markup	
		$sidebar .= "<li><a href=\"member_registration.php\" ";
		if($page == "registration"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">REGISTRATION</a></li>";
		
		
		
		$sidebar .= "<li><a href=\"announcements.php\" ";
		if($page == "announcements"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">ANNOUNCEMENTS</a></li>";
		
		
		
	}
	
	
	//if user is organising secretary or the assistant
	if($_SESSION['Post_ID'] == 7 || $_SESSION['Post_ID'] == 8){
		//sidebar markup	
				
		$sidebar .= "<li><a href=\"announcements.php\" ";
		if($page == "announcements"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">ANNOUNCEMENTS</a></li>";
		
		
	}
	//if treasurer
	
	if($_SESSION['Post_ID'] == 9){
		//sidebar markup	
				
		$sidebar .= "<li><a href=\"view_contributions.php\" ";
		if($page == "view_contribution"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">VIEW CONTRIBUTIONS</a></li>";
		
		
	}
	
	
	
	
	
		$sidebar .= "<li><a href=\"view_all_members.php\" ";
		if($page == "view_all_members" || $page == "view_members" || $page == "update_members"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">VIEW ALL MEMBERS</a></li>";
				
		
		
		
		// Below are the links that are common to all users save the administrator
		// They are added to all users who aren't administrators
		
		$sidebar .= "<li><a href=\"candidacy.php\" ";
		if($page == "candidacy"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">CANDIDACY</a></li>";
		
		
		if($_SESSION['Nation_Status'] == 1){
		$sidebar .= "<li><a href=\"nation_voting_page.php\" ";
		if($page == "nation_voting_page"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">NATION VOTING PAGE</a></li>";
		}
		
		if($_SESSION['Archdiocese_Status'] == 1){
		$sidebar .= "<li><a href=\"archdiocese_voting_page.php\" ";
		if($page == "archdiocese_voting_page"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">ARCHDIOCESE VOTING PAGE</a></li>";
		}
		
		if($_SESSION['Diocese_Status'] == 1){
		$sidebar .= "<li><a href=\"diocese_voting_page.php\" ";
		if($page == "diocese_voting_page"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">DIOCESE VOTING PAGE</a></li>";
		}
		
		if($_SESSION['Deanery_Status'] == 1){
		$sidebar .= "<li><a href=\"deanery_voting_page.php\" ";
		if($page == "deanery_voting_page"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">DEANERY VOTING PAGE</a></li>";
		}
		
		if($_SESSION['Parish_Status'] == 1){
		$sidebar .= "<li><a href=\"parish_voting_page.php\" ";
		if($page == "parish_voting_page"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">PARISH VOTING PAGE</a></li>";
		}
		
		if($_SESSION['Outstation_Status'] == 1){
		$sidebar .= "<li><a href=\"outstation_voting_page.php\" ";
		if($page == "outstation_voting_page"){
			$sidebar .= "class = \"selected\"";
		}
		$sidebar .= ">OUTSTATION VOTING PAGE</a></li>";
		}
		
		
		
		
		
		
	}
	
	$sidebar .= "</ul></div>";

?>