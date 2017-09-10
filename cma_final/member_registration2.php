<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">

        <h2>Registration</h2>
        <p>Content goes here</p>
        <p> Welcome to the member registration form. Please enter the following details about the member.</p> <br />
        <form action="functions/new_member.php" method="post" name="member_reg">
         
         <table>
            <tr>
                <td><label class="txtbxlabel" for="National_ID">National ID Number:</label></td>
                <td><input class="txtbx" name="National_ID" type="text" maxlength="9" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="First_Name">First Name: </label></td>
                <td><input class="txtbx" name="First_Name" type="text" maxlength="15" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="Surname">Surname: </label></td>
                <td><input class="txtbx" name="Surname" type="text" maxlength="15" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="Other_name">Other Names:</label></td>
                <td><input name="Other_name" type="text" maxlength="20" /></td>
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
                <td><label class="txtbxlabel" for="NOK">Next of Kin ID:</label></td>
                <td><input name="NOK" type="text" maxlength="10" /></td>
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
                <td><label class="txtbxlabel" for="CMA_No">CMA number:</label></td>
                <td><input name="CMA_No" type="text" maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><input type="submit" value="Register" /></td>
                
            </tr>
        
            </table>
        </form>
        
</div>

<div class="sidebar2">
    <h3>Sidebar2</h3>
    <p>Stuff goes here</p>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

<?php 
include("includes/footer.php");

?>

