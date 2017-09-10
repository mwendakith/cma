
<?php 
error_reporting(E_PARSE); 
include("includes/session.php");
include("includes/functions.php");
?>
<?php require("includes/connection.php");?>
<?php include("includes/announcement_bar.php");?>
<?php 
	$page = "registration";
	
if ($_SESSION['Post_ID'] == 5 || $_SESSION['Post_ID'] == 6 || $_SESSION['Post_ID'] == 7 || $_SESSION['Post_ID'] == 8 || $_SESSION['Post_ID'] == 1){
	
}
else{
	redirect_to("homepage.php");
}

	include("includes/header.php");
?>
<?php include("includes/sidebar.php");?>
<script type="text/javascript">
	function validateForm(){
		var sendForm = true;
		var fields = document.getElementsByClassName("reqd")
		
		for(var i = 0; i < fields.length; i++) {
        if(!fields[i].value) {
            fields[i].style.border = "#F00 solid";
            sendForm = false;
        }
        else {
            //Else block added due to comments about returning colour to normal
            fields[i].style.border = "inherit";
        }
    }
	return sendForm;
		
		
		
		/*if(document.getElementsByName("CMA_No").value == "" || document.getElementsByName("CMA_No").value == null){
			//document.getElementsById("CMA_No").className += " invalid";
			document.getElementById("CMA_No").style.border = "#F00 solid";
			//document.getElementsById("CMA_No")
			return false;
			
		}
		*/
		
	}

</script>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">
		<h2>Registration</h2>
        
        <p> Welcome to the member registration form. Please enter the following details about the member.</p> 
        <?php 
			if($_SESSION['Post_ID'] == 1){
				echo "<p>*Note that the Admin may enter the post and outstation of a member</p>";
			}
		
		?>
        <form onsubmit="return validateForm()" action="new_member.php" method="post" name="member_reg" enctype="multipart/form-data">
         
         <table>
         	<tr>
                <td><label class="txtbxlabel" for="CMA_No">CMA number:</label></td>
                <td><input id="CMA_No" class="reqd txtbx" name="CMA_No" type="text" maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="First_Name">First Name: </label></td>
                <td><input class="reqd txtbx" name="First_Name" type="text" maxlength="15" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="Surname">Surname: </label></td>
                <td><input class="reqd txtbx" name="Surname" type="text" maxlength="15" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="Other_Name">Other Names:</label></td>
                <td><input name="Other_Name" type="text" maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="National_ID">National ID Number:</label></td>
                <td><input class="txtbx" name="National_ID" type="text" maxlength="9" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="Mobile_No">Mobile Number:</label></td>
                <td><input name="Mobile_No" type="text" maxlength="10" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="House_No">House Number:</label></td>
                <td><input name="House_No" type="text" maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="SCC">Small Christian Community:</label></td>
                <td><input name="SCC" type="text" maxlength="20" /></td>
            </tr>
            
            
            <tr>
                <td><label class="txtbxlabel" for="NOK_Name">Next of Kin Name:</label></td>
                <td><input name="NOK_Name" type="text" maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="NOK_No">Next of Kin Number:</label></td>
                <td><input name="NOK_No" type="text" maxlength="10" /> </td>
            </tr>
            
            <tr>
            <td><label class="imglabel" for="imgfile">Image:</label></td>
            <td><input type="file" name="imgfile" accept="image/*"></td>			
            </tr>
            
            <?php
            if($_SESSION['Post_ID'] == 1){
            echo "
            <tr>
                <td colspan=\"2\" style=\"font-weight:bold;\">Admin Options:</td>
            </tr>
            
            <tr>
                <td><label class=\"txtbxlabel\" for=\"Post\">Post:</label></td>
                <td>
                <select name=\"Post\">
                <option value=\"1\">Administrator</option>
                <option value=\"2\">Chairman</option>
                <option value=\"3\">Vice Chairman</option>
                <option value=\"4\">Ass. Vice Chair</option>
                <option value=\"5\">Secretary</option>
                <option value=\"6\">Ass. Secretary</option>
                <option value=\"7\">Organising Secretary</option>
                <option value=\"8\">Ass. Org. Secretary</option>
                <option value=\"9\">Treasurer</option>
                <option value=\"10\" selected=\"selected\">Member</option>
                </select></td>
            </tr>
            
             <tr>
                <td><label class=\"txtbxlabel\" for=\"NOK_No\">Outstation</label></td>
                <td>";
				
					$selquery = "SELECT * FROM `outstation`";
					$result2 = mysql_query($selquery);
					echo "<select name=\"Outstation_ID\">";
					
					while($outstation = mysql_fetch_array($result2)){
						echo "<option value=\"{$outstation['Outstation_ID']}\">{$outstation['Name']}</option>";
						
					}
					echo "</select>
				 
                 </td></tr>
				 <tr>
                <td><label class=\"txtbxlabel\" for=\"Division\">Division:</label></td>
                <td>
                <select name=\"Division\">
                <option value=\"1\">Nation</option>
                <option value=\"2\">Archdiocese</option>
                <option value=\"3\">Diocese</option>
                <option value=\"4\">Deanery</option>
                <option value=\"5\">Parish</option>
                <option value=\"6\" selected=\"selected\">Outstation</option>
                
                </select></td>
            </tr>
				 ";
            }
			?>
             
            
            <tr>
         	       <td><input type="submit" value="Register" /></td>
                
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

