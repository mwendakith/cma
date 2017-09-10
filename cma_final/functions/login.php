<?php

	//Function to validate the details of a user
	function login($username, $password){
		//Retrieves user information
		$sql = "SELECT * FROM Login WHERE Username = '{$username}'";
		mysql_query($con, $sql);
		$row = mysql_fetch_row();
		
		//Checks if the username exists
		//If the username does not exist then no rows will be returned from the database
		if(count($row) < 1){
			echo "Username is invalid. Please re-enter.";
		}
		
		//If a row is returned then the username exists
		//Below checks if the password matches the one in the database
		else{
			$pass = $row['password'];
			
			//Checks if the user information is valid
			if($pass == $password){
				echo "Successful login";
				
				$id = $row['National_ID'];
				store_details($id);
			}
		
			else{
				echo "The password is incorrect. Please re-enter the password.";
			}
		}
	}


?>