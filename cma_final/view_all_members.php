<?php include("includes/session.php");
$page = "view_all_members";
if($_SESSION['Post_ID'] == 10){
	$user = "member";
}elseif($_SESSION['Post_ID'] == 5){
	$user = "secretary";
}elseif($_SESSION['Post_ID'] == 9){
	$user = "treasurer";
}

?>
<?php include("includes/functions.php");?>
<?php require("includes/connection.php");?>
<?php include("includes/header.php");?>
<?php include("includes/announcement_bar.php");?>
<?php include("includes/sidebar.php");?>
<div class="middle">
<?php
	echo $sidebar;
?>
<script type="text/javascript">
function genSearch(){
	if(document.getElementById("searchsel").value == 2){
		document.getElementById("search").style.display = "block";
		
	}else{
		document.getElementById("search").style.display = "none";
		document.getElementById("allmembers").style.display = "block";
	}

}



</script>
<div class="content">

        <h2>Members</h2>
       
        
        <select id="searchsel" onchange="genSearch()">
          <option selected="selected" id="optallMembers" value="1">All Members</option>
          <option id="optsearch" value="2">Search</option>
		</select>
         <a id="allmembers" href="view_all_members.php" style="display:none; color:#930;" >Go</a>
        
        
        <form id="search" style="display:none" method="get" action="view_all_members.php">
        <label>Enter Search String:</label>
        <input type="text" name="searchstr" value="<?php if(isset($_GET['searchstr'])){echo $_GET['searchstr'];} ?>" />
        <input type="submit" value="Search" /></form>
    
        
        <?php
		
		if(isset($_GET['state'])){
			if($_GET['state'] == "del"){
				$del_query = "DELETE FROM `members` WHERE National_ID = {$_GET['nid']}";
				$del_query2 = "DELETE FROM `users` WHERE cma_no = {$_GET['cma_no']}";
				
				$result = mysql_query($del_query, $connection);
				$result2 = mysql_query($del_query2, $connection);
				
			}	
		}
		
		if(isset($_GET['searchstr'])){
			echo "<script type=\"text/javascript\">";
			
			
			echo "document.getElementById(\"optsearch\").selected = \"selected\";document.getElementById(\"search\").style.display = \"block\";";
			
			
            echo "</script>";
			$searchstr = $_GET['searchstr'];
			
			$selquery = "SELECT * FROM  `members`, `posts`, outstation, divisions WHERE members.Post_ID = posts.Post_ID AND members.Outstation_ID = outstation.Outstation_ID AND members.Division_ID = divisions.Division_ID AND (members.cma_no LIKE \"%{$searchstr}%\" OR members.First_Name LIKE \"%{$searchstr}%\"  OR members.Surname LIKE \"%{$searchstr}%\" OR members.Other_Names LIKE \"%{$searchstr}%\" OR members.Mobile_No LIKE \"%{$searchstr}%\" OR members.House_No LIKE \"%{$searchstr}%\" OR members.SCC LIKE \"%{$searchstr}%\" OR members.Joining_Date LIKE \"%{$searchstr}%\" OR outstation.Name LIKE \"%{$searchstr}%\" )";
			
		}else{
			$selquery = "SELECT * FROM  `members`, `posts`, outstation, divisions WHERE members.Post_ID = posts.Post_ID AND members.Outstation_ID = outstation.Outstation_ID AND members.Division_ID = divisions.Division_ID";
		}
			$rs = mysql_query($selquery,$connection);
			
			$tabledata = "<table border=\"1\" class = \"memberdata\"><tr><th>Cma_No</th><th>First Name</th><th>Other Name</th><th>Surname</th><th>National ID</th>";
			if($_SESSION['Post_ID'] == 5 || $_SESSION['Post_ID'] == 6){
				$tabledata .= "<th>Mobile No</th><th>House No</th>";
			}
			$tabledata .= "<th>SCC</th><th>Joining Date</th><th>Post</th><th>Outstation</th><th>Division</th><th colspan = 2>Action</th></tr>";
			
					
			while ($members = mysql_fetch_array($rs)) {
				$tabledata .= "<tr><td>" . $members['cma_no'] . "</td>";
				$tabledata .= "<td>" . $members['First_Name'] . "</td>";
				$tabledata .= "<td>" . $members['Other_Names'] . "</td>";
				$tabledata .= "<td>" . $members['Surname'] . "</td>";
				$tabledata .= "<td>" . $members['National_ID'] . "</td>";
				if($_SESSION['Post_ID'] == 5 || $_SESSION['Post_ID'] == 6 ){
					$tabledata .= "<td>" . $members['Mobile_No'] . "</td>";
					$tabledata .= "<td>" . $members['House_No'] . "</td>";
				}
				$tabledata .= "<td>" . $members['SCC'] . "</td>";
				$tabledata .= "<td>" . $members['Joining_Date'] . "</td>";
				$tabledata .= "<td>" . $members['Post_Name'] . "</td>";
				$tabledata .= "<td>" . $members['Name'] . "</td>";
				$tabledata .= "<td>" . $members['Division_Name'] . "</td>";
				$tabledata .= "<td><a href=\"view_member.php?nid={$members['National_ID']}\">View</a></td>";
				if($user == "secretary"){
					$tabledata .= "<td><a href=\"update_members.php?nid={$members['National_ID']}\">Update</a></td>";
					$tabledata .= "<td><a onclick=\"return confirm('Are you sure?')\" href=\"view_all_members.php?nid={$members['National_ID']}&amp;state=del&amp;cma_no={$members['cma_no']}\">Delete</a></td>";
				}
				if($user == "treasurer"){
					$tabledata .= "<td><a href=\"contribution.php?nid={$members['National_ID']}&amp;cma_no={$members['cma_no']}\">Contribution</a></td>";
				}
				$tabledata .= "</tr>";
			}
			
			$tabledata .= "</table>";
			
			echo $tabledata;
			

			
			
		?>
        
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

