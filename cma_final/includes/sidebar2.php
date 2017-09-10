<?php 
	echo "<table class=\"sbtable\">
	<tr><th colspan = 2>Divisions</th></tr>
    <tr><td>Archdioscese:</td><td>{$_SESSION['Archdiocese_Name']}</td></tr>
    <tr><td>Dioscese:</td><td>{$_SESSION['Diocese_Name']}</td></tr>
    <tr><td>Deanery:</td><td>{$_SESSION['Deanery_Name']}</td></tr>
    <tr><td>Parish:</td><td>{$_SESSION['Parish_Name']}</td></tr>
    <tr><td>Outstation:</td><td>{$_SESSION['Outstation_Name']}</td></tr>
	</table>";
	
?>