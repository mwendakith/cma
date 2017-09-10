<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMA</title>
<?php 
	/* 
	if($page != "login"){
		if(!isset($_SESSION['Post_ID'])){
			header("Location: login.php");
		}
	}
        */
	/*if(isset($page)){
		if($page == "registration"){
			echo "<script type=\"text/javascript\" src=\"javascripts/validation.js\"></script>";
		}
	}
         * 
	


<link type="text/css" rel="stylesheet" href="stylesheets/styles.css" />
         * 
         */

echo link_tag("stylesheets/styles.css");
        
?>
</head>

<body>

<div class="container">

    <div class="header">
        <div id="heading"><h1><?php echo anchor("login/home",  "CATHOLIC MENS ASSOCIATION");   ?></h1></div>
    	<div id="currloggedin">
		<?php 
			
		if(!isset($loggedout)){
			if($this->session->userdata("first_name") != null){
				echo "<p id='currloggedin'> {$this->session->userdata("first_name")} {$this->session->userdata("surname")} <br/>" . anchor ('login/logout', 'Logout', array('title' => 'Logout')) . "&nbsp;|&nbsp;" . anchor ('login/logout', 'Edit Profile', array('title' => 'Edit Profile')) . "</p>";
				}
		}
			
        ?>
        </div>
	</div>

