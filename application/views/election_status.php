<div class="content">
<h2>Election Status</h2>
<p>Welcome to the election status page. <br /><br /></p>


<form name='Outstation' action='functions/change_election_status.php' method='post'>
Outstation status: <br />

<select name="status" onchange='get_out(this.value)' >
<option value=''>--Select a status--</option>
<option value=1 >Polling Period</option>
<option value=2 >Nomination Period</option>
</select>
<input type='hidden' name='division' value=6  />
&nbsp;
<input type='submit' value='Submit' />
</form>
<br />
<br />

<?php
// Checks the level of the chairman and thus which level of election he may start
$rank = $this->session->userdata("post_id");
if($rank < 6){
	echo "Parish status: &nbsp;";
	echo "<form name='Parish' action='functions/change_election_status.php' method='post'>";
	echo "<select name='parish_status' onchange='get_par(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1>Polling Period</option>" . "<option value=2>Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

if($rank < 5){
	echo "Deanery status: &nbsp;";
	echo "<form name='Deanery' action='functions/change_election_status.php' method='post'>";
echo "<select name='deanery_status' onchange='get_dean(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1>Polling Period</option>" . "<option value=2 >Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

if($rank < 4){
	echo "Diocese status: &nbsp;";
	echo "<form name='Diocese' action='functions/change_election_status.php' method='post'>";
	echo "<select name='diocese_status' onchange='get_dioc(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1 >Polling Period</option>" . "<option value=2 >Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

if($rank < 3){
	echo "Archdiocese status: &nbsp;";
	echo "<form name='Diocese' action='functions/change_election_status.php' method='post'>";
	echo "<select name='archdiocese_status' onchange='get_arc(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1 >Polling Period</option>" . "<option value=2 >Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

if($rank < 2){
	echo "Nation status: &nbsp;";
	echo "<select name='nation_status' onchange='get_nat(this.value)'>" . "<option value=''>--Select a status--</option>" . "<option value=1 >Polling Period</option>" . "<option value=2 >Nomination Period</option>";
	echo "<input type='hidden' name='division' value=5  /> &nbsp;";
	echo "<input type='submit' value='Submit' /></form>";
	echo "<br /><br />";
}

?>



<p id="respond"></p>

</div>