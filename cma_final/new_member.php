<?php include("includes/session.php");
$page = "registration";
?>
<?php require("includes/connection.php");?>
<?php include("includes/header.php");?>
<?php include("includes/announcement_bar.php");?>
<?php include("includes/sidebar.php");?>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">

        <h2>New Member</h2> 
        <?php
		//if(isset($_POST['submit'])){
			
	  $filename=  $_FILES["imgfile"]["name"];
	  if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < 500000))
	  {
		if(file_exists($_FILES["imgfile"]["name"]))
		{
		  echo "File name exists.";
		}
		else
		{
		  move_uploaded_file($_FILES["imgfile"]["tmp_name"],"images/profile_images/$filename");
		  //echo "Upload Successful . <a href='images/profile_images/$filename'>Click here</a> to view the uploaded image";
		}
	  }
	  else
	  {
		echo "invalid file.";
	  }
	/*}
	else
	{
	}
	*/
		

		
		
		
		$query2 = "INSERT INTO `cma`.`next_of_kin`(`NOK_ID`, `NOK_Name`, `NOK_Number`) VALUES ('','{$_POST['NOK_Name']}','{$_POST['NOK_No']}')";
		
		$result2 = mysql_query($query2, $connection);
		
		$rsnok = mysql_query("SELECT * FROM `next_of_kin` WHERE NOK_Number = {$_POST['NOK_No']}");
		$nok = mysql_fetch_array($rsnok);
		
		$query = "INSERT INTO `cma`.`members` (`cma_no`, `National_ID`, `Surname`, `First_Name`, `Other_Names`, `Mobile_No`, `House_No`, `SCC`, `NOK_ID`, `Joining_Date`, `Outstation_ID`, `Post_ID`, `Division_ID`, `Vote_Status`,`Image`) ";
		$query .= "VALUES ('{$_POST['CMA_No']}', '{$_POST['National_ID']}', '{$_POST['Surname']}', '{$_POST['First_Name']}', '{$_POST['Other_Name']}', '{$_POST['Mobile_No']}', '{$_POST['House_No']}', '{$_POST['SCC']}', '{$nok['NOK_ID']}', '" . date("Y-m-d") . "', '";
		if($_SESSION['Post_ID'] == 1){
			$query .= "{$_POST['Outstation_ID']}";
		}elseif($_SESSION['Post_ID'] == 5 || $_SESSION['Post_ID'] == 6 || $_SESSION['Post_ID'] == 7){
			$query .= "{$_SESSION['Outstation_ID']}";
		}
			
		$query .= "', '";
		if($_SESSION['Post_ID'] == 1){
			$query .= "{$_POST['Post']}";
		}elseif($_SESSION['Post_ID'] == 5 || $_SESSION['Post_ID'] == 6 || $_SESSION['Post_ID'] == 7){
			$query .= "10";
		}
		
		$query .= "', '";
		if($_SESSION['Post_ID'] == 1){
			$query .= "{$_POST['Division']}";
		}elseif($_SESSION['Post_ID'] == 5 || $_SESSION['Post_ID'] == 6 || $_SESSION['Post_ID'] == 7){
			$query .= "6";
		}
		$query .= "', '0', '{$filename}');";
		$result = mysql_query($query, $connection);
				//echo "the query is" . $query;
		
		$query3 = "INSERT INTO `cma`.`users`(`id`, `cma_no`, `username`, `hashed_password`) VALUES ('','{$_POST['CMA_No']}', '{$_POST['First_Name']}' ,'" . sha1("12345678") . "')";
		
		$result3 = mysql_query($query3, $connection);

		
		
		
		if (!$result || !$result2) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			die($message);
		}
		

		
		?>
        <h3>The following member has been entered:</h3>
        <?php
		echo "<table>
		<tr><td>Cma No</td><td>{$_POST['CMA_No']}</td><td rowspan=\"10\"><img src=\"images/profile_images/$filename\" width=\"194\" height=\"259\" /></td></tr>
		<tr><td>First Name</td><td>{$_POST['First_Name']}</td></tr>
		<tr><td>Other Name</td><td>{$_POST['Other_Name']}</td></tr>
		<tr><td>Surname</td><td>{$_POST['Surname']}</td></tr>
		<tr><td>National Id</td><td>{$_POST['National_ID']}</td></tr>
		<tr><td>Mobile No</td><td>{$_POST['Mobile_No']}</td></tr>
		<tr><td>House No</td><td>{$_POST['House_No']}</td></tr>
		<tr><td>Nok_Name</td><td>{$_POST['NOK_Name']}</td></tr>
		<tr><td>Outstation</td><td>{$_SESSION['Outstation_ID']}</td></tr>
		<tr><td>Date Of Joining</td><td>" . date("Y-m-d") . "</td></tr></table>";
		
		
		/*echo $_POST['National_ID'] . "<br />";
		echo $_POST['First_Name'] . "<br />";
		echo $_POST['Surname'] . "<br />";
		echo $_POST['Other_Name'] . "<br />";
		echo $_POST['Mobile_No'] . "<br />";
		echo $_POST['House_No'] . "<br />";
		echo $_POST['SCC'] . "<br />";
		echo $_POST['NOK_Name'] . "<br />";
		echo $_POST['CMA_No'] . "<br />";
		echo $_SESSION['Outstation_ID'] . "<br />";
		echo date("Y-m-d") . "<br />";
		*/
		
		?>
        
        <a href="member_registration.php">Back To Registration</a>
        
</div>

<div class="sidebar2">
    <?php echo $announcement_string; ?>
    
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

<?php 
include("includes/footer.php");

?>

