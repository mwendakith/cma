<?php require_once("includes/session.php"); 
$page = "update_members";
?>
<?php require("includes/connection.php");?>
<?php include("includes/functions.php");?>
<?php include("includes/announcement_bar.php");?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

<?php 
	$page = "update_members";
	if(isset($_GET['state'])){
	if($_GET['state'] == "update"){
		if($_FILES["imgfile"]["name"] != ""){
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
	}
	  
		$query1 = "UPDATE  `cma`.`members` SET " ;
		$query1 .= "`First_Name` =  '{$_POST['First_Name']}', ";
		$query1 .= "`Surname` =  '{$_POST['Surname']}', ";
		$query1 .= "`Other_Names` =  '{$_POST['Other_Name']}', ";
		$query1 .= "`House_No` =  '{$_POST['House_No']}', ";
		$query1 .= "`Mobile_No` =  '{$_POST['Mobile_No']}', ";
		if($_FILES["imgfile"]["name"] != ""){
			$query1 .= "`Image` =  '{$filename}', ";
		}
		$query1 .= "`SCC` =  '{$_POST['SCC']}' ";
		
		$query1 .= " WHERE  `members`.`cma_no` =  '{$_POST['CMA_No']}';";
		
		$result = mysql_query($query1, $connection);
		
		}
	}
	
	
	$selquery = "SELECT * FROM members, next_of_kin WHERE National_ID = {$_GET['nid']} AND members.NOK_ID = next_of_kin.NOK_ID ";
	$rs = mysql_query($selquery, $connection);
	$member = mysql_fetch_array($rs);
	
	
	
?>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">

        <h2>Update Member</h2>
        
        <form action="update_members.php?nid=<?php echo $member['National_ID'] ?>&amp;state=update" method="post" name="member_upd" enctype="multipart/form-data">
         
         <table>
         	<tr>
                <td><label class="txtbxlabel" for="CMA_No">CMA number:</label></td>
                <td><input class="reqd txtbx" name="CMA_No" type="text" value="<?php echo $member['cma_no'] ?>" maxlength="20" /></td>
                <td rowspan=10><img src="images/profile_images/<?php echo $member['Image'] ?>" width="194" height="259" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="First_Name">First Name: </label></td>
                <td><input class="reqd txtbx" name="First_Name" type="text" value="<?php echo $member['First_Name'] ?>" maxlength="15" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="Surname">Surname: </label></td>
                <td><input class="reqd txtbx" name="Surname" type="text" value="<?php echo $member['Surname'] ?>" maxlength="15" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="Other_Name">Other Names:</label></td>
                <td><input name="Other_Name" type="text" value="<?php echo $member['Other_Names'] ?>" maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="National_ID">National ID Number:</label></td>
                <td><input class="txtbx" name="National_ID" type="text" value="<?php echo $member['National_ID'] ?>" maxlength="9" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="Mobile_No">Mobile Number:</label></td>
                <td><input name="Mobile_No" type="text" value="<?php echo $member['Mobile_No'] ?>" maxlength="10" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="House_No">House Number:</label></td>
                <td><input name="House_No" type="text" value="<?php echo $member['House_No'] ?>" maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="SCC">Small Christian Community:</label></td>
                <td><input name="SCC" type="text" value="<?php echo $member['SCC'] ?>" maxlength="20" /></td>
            </tr>
            
            
            <tr>
                <td><label class="txtbxlabel" for="NOK_Name">Next of Kin Name:</label></td>
                <td><input name="NOK_Name" type="text" value="<?php echo $member['NOK_Name'] ?>" maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="NOK_No">Next of Kin Number:</label></td>
                <td><input name="NOK_No" type="text" value="<?php echo $member['NOK_Number'] ?>" maxlength="10" /> </td>
            </tr>
            
            
            <tr>
            <td><label class="imglabel" for="imgfile">Image:</label></td>
            <td><input type="file" name="imgfile"></td>			
            </tr>

            
            <tr>
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

