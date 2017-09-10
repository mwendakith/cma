<?php 
error_reporting(E_PARSE); 
session_start();
$page = "login";
if(isset($_GET['state'])){
	if($_GET['state'] == "logout"){
		session_destroy();
		$loggedout = true;
	}
}

?>
<?php require("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php include("functions/voting_period.php");?>

<?php
	//login logic
	if(isset($_POST['submit'])){
		$value = "You have entered this site before";
		$username = $_POST['username'];
		$hashed_password = sha1($_POST['password']);
		// Check database to see if username and the hashed password exist there.
		$query = "SELECT users.id, users.username, users.cma_no, members.National_ID, members.First_Name, members.Surname, members.Post_ID, members.Outstation_ID, members.Division_ID, posts.Post_Name ";
		$query .= "FROM users, members, posts ";
		$query .= "WHERE username = '{$username}' ";
		$query .= "AND hashed_password = '{$hashed_password}' ";
		$query .= "AND users.cma_no = members.cma_no ";
		$query .= "AND members.Post_ID = posts.Post_ID LIMIT 1";
		$result_set = mysql_query($query);
		confirm_query($result_set);
		if (mysql_num_rows($result_set) == 1) {
			// username/password authenticated
			// and only 1 match
			$found_user = mysql_fetch_array($result_set);
			//set sessions to store logged in user details
			$_SESSION['user_id'] = $found_user['id'];
			$_SESSION['username'] = $found_user['username'];
			
			$_SESSION['National_ID'] = $found_user['National_ID'];
			$_SESSION['cma_no'] = $found_user['cma_no'];
			$_SESSION['Post_ID'] = $found_user['Post_ID'];
			$_SESSION['Division_ID'] = $found_user['Division_ID'];
			$_SESSION['Outstation_ID'] = $found_user['Outstation_ID'];
			$_SESSION['First_Name'] = $found_user['First_Name'];
			$_SESSION['Surname'] = $found_user['Surname'];
			$_SESSION['Post_Name'] = $found_user['Post_Name'];
		
	
	//Stores the parish id of the member
	$sql = "SELECT * FROM Outstation WHERE Outstation_ID = '{$_SESSION['Outstation_ID']}'";
	$get_parish = mysql_query($sql);
	$row = mysql_fetch_array($get_parish);
	$parish_ID = $row['Parish_ID'];
	mysql_free_result($get_parish);
	$_SESSION['Parish_ID'] = $parish_ID;
	$_SESSION['Outstation_Name'] = $row['Name'];
	// Checks if there is an election going on
	// If it is true, then it calls a function that checks if the deadline has been met
	if ($row['Election_Status'] == 1){
	check_deadline("Outstation", $_SESSION['Outstation_ID'], "Outstation_ID");
	}
	
	//Stores the deanery id of the member
	$sql = "SELECT * FROM Parish WHERE Parish_ID = '{$parish_ID}'";
	$get_deanery = mysql_query($sql);
	$row = mysql_fetch_array($get_deanery);
	$deanery_ID = $row['Deanery_ID'];
	mysql_free_result($get_deanery);
	$_SESSION['Deanery_ID'] = $deanery_ID;
	$_SESSION['Parish_Name'] = $row['Name'];
	// Checks if there is an election going on
	// If it is true, then it calls a function that checks if the deadline has been met
	if ($row['Election_Status'] == 1){
	check_deadline("Parish", $_SESSION['Parish_ID'], "Parish_ID");
	}
	
	//Stores the diocese id of the member
	$sql = "SELECT * FROM Deanery WHERE Deanery_ID = '{$deanery_ID}'";
	$get_diocese = mysql_query($sql);
	$row = mysql_fetch_array($get_diocese);
	$diocese_ID = $row['Diocese_ID'];
	mysql_free_result($get_diocese);
	$_SESSION['Diocese_ID'] = $diocese_ID;
	$_SESSION['Deanery_Name'] = $row['Name'];
	// Checks if there is an election going on
	// If it is true, then it calls a function that checks if the deadline has been met
	if ($row['Election_Status'] == 1){
	check_deadline("Deanery", $_SESSION['Deanery_ID'], "Deanery_ID");
	}
	
	//Stores the archdiocese id of the member
	$sql = "SELECT * FROM diocese WHERE Diocese_ID = '{$diocese_ID}'";
	$get_archdiocese = mysql_query($sql);
	$row = mysql_fetch_array($get_archdiocese);
	$archdiocese_ID = $row['Archdiocese_ID'];
	mysql_free_result($get_archdiocese);
	$_SESSION['Archdiocese_ID'] = $archdiocese_ID;
	$_SESSION['Diocese_Name'] = $row['Name'];
	// Checks if there is an election going on
	// If it is true, then it calls a function that checks if the deadline has been met
	if ($row['Election_Status'] == 1){
	check_deadline("Diocese", $_SESSION['Diocese_ID'], "Diocese_ID");
	}
	
	$sql = "SELECT * FROM archdiocese WHERE Archdiocese_ID = '{$archdiocese_ID}'";
	$get_archdiocese_name = mysql_query($sql);
	$row = mysql_fetch_array($get_archdiocese_name);
	$_SESSION['Archdiocese_Name'] = $row['Name'];
	// Checks if there is an election going on
	// If it is true, then it calls a function that checks if the deadline has been met
	if ($row['Election_Status'] == 1){
	check_deadline("Archdiocese", $_SESSION['Archdiocese_ID'], "Archdiocese_ID");
	}
	

	
	//Stores the nation id of the member
	$_SESSION['Nation_ID'] = 1;
			
			redirect_to("homepage.php");
		} else {
			// username/password combo was not found in the database
			$message = "Username/password combination incorrect.<br />
				Please make sure your caps lock key is off and try again.";
		}
		
	}else{
		$message = "";
		$value = "You are entering the site for the first time";	
		$username = "";
		$password = "";
	}

?>

<?php 
include("includes/header.php");

?>

<div class="middle">


<div class="content" style="width:90%; background-color:#E6E6E6;">
<h2>Login:</h2>
<p><?php echo $message;?></p>
<form action="login.php" method="post">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" maxlength="30" value="" /></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" maxlength="30" value="" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Login" /></td>
				</tr>
			</table>
			</form>
</div>  
</div>

<?php 
include("includes/footer.php");

?>

