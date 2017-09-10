<?php
	function confirm_query($result_set) {
			if (!$result_set) {
				die("Database query failed: " . mysql_error());
			}
		}
		
	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
?>