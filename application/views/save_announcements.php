<div class="content">
<h2>Announcements</h2>
<p>Welcome to the announcements page. Once you enter announcements, click on the submit. </p>

    <form name='Outstation' action='<?php echo site_url('sec_pages/update_announcements'); ?>' method='post'>
        <table><tr>
        <td>Outstation Announcements: &nbsp;&nbsp;&nbsp;</td>
        <td><input type=type='textarea' rows='3' cols='4' name='Announcement'  />&nbsp;&nbsp;&nbsp;</td>
<input type='hidden' name='Table' value='Outstation'  />
<input type='hidden' name='Table_ID' value='Outstation_ID'  />
<?php	
$outstation_id = $this->session->userdata("outstation_id");
echo "<input type='hidden' name='Division' value='{$outstation_id}'  />";
?>
&nbsp;
<td><input type='submit' value='submit' /></td></form>
<br />
</tr>

<?php
// Gets the rank of the Secretary
$rank = $this->session->userdata("division_id");

// If he has parish clearance, allow the secretary to post the announcement for the parish
if($rank < 6){
	echo "<form name='parish' action='functions/save_announcements.php' method='post'>";
	echo "<tr><td> Parish Announcements: </td>";
	echo "<td><input type='textarea' rows='3' cols='4' name='Announcement'  /> </td>";
	echo "<input type='hidden' name='Table' value='Parish'  />";
	echo "<input type='hidden' name='Table_ID' value='Parish_ID'  />";
	$parish_id = $this->session->userdata("parish_id");
	echo "<input type='hidden' name='Division' value='{$parish_id}'  />";
	echo "<td> <input type='submit' value='submit' /></td></tr></form>";
	echo "<br />";
	echo "<br />";
	
}


// If he has deanery clearance, allow the secretary to post the announcement for the deanery
if($rank < 5){
	echo "<form name='deanery' action='functions/save_announcements.php' method='post'>";
	echo "<tr><td>Deanery Announcements: </td>";
	echo "<td><input type='textarea' rows='3' cols='4' name='Announcement'  /></td>";
	echo "<input type='hidden' name='Table' value='Deanery'  />";
	echo "<input type='hidden' name='Table_ID' value='Deanery_ID'  />";
	$deanery_id = $this->session->userdata("deanery_id");
	echo "<input type='hidden' name='Division' value='{$deanery_id}'  />";
	echo "<td> <input type='submit' value='submit' /></td></tr></form>";
	echo "<br />";
	echo "<br />";
	
}

// If he has diocese clearance, allow the secretary to post the announcement for the diocese
if($rank < 4){
	echo "<form name='diocese' action='functions/save_announcements.php' method='post'>";
	echo "<tr><td>Diocese Announcements: </td>";
	echo "<td><input type='textarea' rows='3' cols='4' name='Announcement'  /></td>";
	echo "<input type='hidden' name='Table' value='Diocese'  />";
	echo "<input type='hidden' name='Table_ID' value='Diocese_ID'  />";
	$diocese_id = $this->session->userdata("diocese_id");
	echo "<input type='hidden' name='Division' value='{$diocese_id}'  />";
	echo "&nbsp; <td><input type='submit' value='submit' /></td></tr></form>";
	echo "<br />";
	echo "<br />";
	
}

// If he has Archdiocese clearance, allow the secretary to post the announcement for the Archdiocese
if($rank < 3){
	echo "<form name='archdiocese' action='functions/save_announcements.php' method='post'>";
	echo "<tr><td>Archdiocese Announcements: </td>";
	echo "<td><input type='textarea' rows='3' cols='4' name='Announcement'  /></td>";
	echo "<input type='hidden' name='Table_ID' value='Archdiocese_ID'  />";
	$archdiocese_id = $this->session->userdata("archdiocese_id");
	echo "<input type='hidden' name='Division' value='{$parish_id}'  />";
	echo "<td> <input type='submit' value='submit' /></td></tr></form>";
	echo "<br />";
	echo "<br />";
	
}

// If he has nation clearance, allow the secretary to post the announcement for the nation
if($rank < 2){
	echo "<form name='Nation' action='functions/save_announcements.php' method='post'>";
	echo "<tr><td>Nation Announcements:</td>";
	echo "<td><input type='textarea' rows='3' cols='4' name='Announcement'  /></td> ";
	echo "<input type='hidden' name='Table' value='Nation'  />";
	echo "<input type='hidden' name='Table_ID' value='Nation_ID'  />";
	
	echo "<input type='hidden' name='Division' value=1  />";
	echo "<td> <input type='submit' value='submit' /></td></tr>";
	echo "<br />";
	echo "<br />";
	echo "<br />";
}
?>

</table></form>

</div>
