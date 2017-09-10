<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMA</title>
<?php 
	 
	if($page != "login"){
		if(!isset($_SESSION['Post_ID'])){
			header("Location: login.php");
		}
	}

	/*if(isset($page)){
		if($page == "registration"){
			echo "<script type=\"text/javascript\" src=\"javascripts/validation.js\"></script>";
		}
	}
	*/
?>
<link type="text/css" rel="stylesheet" href="stylesheets/styles.css" />
</head>

<body>

<div class="container">

    <div class="header">
    	<div id="heading"><h1><a href="homepage.php">CATHOLIC MENS ASSOCIATION</a></h1></div>
    	<div id="currloggedin">
		<?php 
			
		if(!isset($loggedout)){
			if(isset($_SESSION['Post_Name'])){
				echo "<p id='currloggedin'> {$_SESSION['First_Name']} {$_SESSION['Surname']} ({$_SESSION['Post_Name']})<br/><a href=\"login.php?state=logout\">Logout</a>&nbsp;|&nbsp;<a href=\"edit_profile.php\">Edit Profile</a></p>";
				}
		}
			
        ?>
        </div>
	</div>

