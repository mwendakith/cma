<div class="middle">


<div class="content" style="width:90%; background-color:#E6E6E6;">
<h2>Login:</h2>
<p><?php echo $message;?></p>
<form  method="post" action="<?php  echo site_url("login/logged");    ?>">
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