<div class="content">
	<h2>Edit Profile</h2>
        
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