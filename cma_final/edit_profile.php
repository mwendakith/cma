
<?php include("includes/session.php");?>

<?php require("includes/connection.php");?>
<?php include("includes/announcement_bar.php");?>
<?php 
	$page = "update_members";
	;
	
	if(isset($_GET['state'])){
		if($_GET['state'] == "edit"){
			$queryuser = "SELECT * FROM users WHERE cma_no = {$_SESSION['cma_no']}";
			$resultuser = mysql_query($queryuser, $connection);
			$user = mysql_fetch_array($resultuser);
			
			if($user['hashed_password'] == sha1($_POST['old_password'])){
				$query1 = "UPDATE  `cma`.`users` SET " ;
				$query1 .= "`username` =  '{$_POST['username']}', ";
				$query1 .= "`hashed_password` =  '" . sha1($_POST['new_password']) . "' ";
				$query1 .= " WHERE  `users`.`cma_no` =  '{$_SESSION['cma_no']}';";
				
				$result = mysql_query($query1, $connection);
				$message = "Successful Update";
				
			}else{
				$message = "Wrong value for old password";
				
			}
			
			
		}
		
		
	}
	
	  
	
	$selquery = "SELECT * FROM users WHERE cma_no = {$_SESSION['cma_no']}";
	$rs = mysql_query($selquery, $connection);
	$member = mysql_fetch_array($rs);
	
	
	
	include("includes/header.php");
?>
<?php include("includes/sidebar.php");?>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">

        <h2>Edit Profile</h2>
        <?php
			if(isset($message)){
				echo $message;
				
			}
			
		
		?>
        
        <form action="edit_profile.php?state=edit" method="post" name="member_upd" enctype="multipart/form-data">
        
        
         
         <table>
         	<tr>
                <td><label for="username">Username:</label></td>
                <td><input name="username" type="text" value="<?php echo $member['username'] ?>" maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="old_password">Old Password: </label></td>
                <td><input class="reqd txtbx" name="old_password" type="text" value="" maxlength="15" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="new_password">New Password: </label></td>
                <td><input class="reqd txtbx" name="new_password" type="text" value="" maxlength="15" /></td>
            </tr>
        
         	       <td><input type="submit" value="Confirm" /></td>
                
            </tr>
        
            </table>
        </form>
        
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

