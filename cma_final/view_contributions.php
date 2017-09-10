<?php 
error_reporting(E_PARSE); 
include("includes/session.php");
$page = "view_contribution";
if($_SESSION['Post_ID'] == 10){
	$user = "member";
}elseif($_SESSION['Post_ID'] == 5){
	$user = "secretary";
}elseif($_SESSION['Post_ID'] == 9){
	$user = "treasurer";
}

?>
<?php include("includes/functions.php");?>
<?php require("includes/connection.php");
if($_SESSION['Post_ID'] != 9){
	redirect_to("homepage.php");
}

?>
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

        <h2>Member Contributions</h2>

        
        <form id="search" method="get" action="view_contributions.php">
        <label>Enter Cma_No:</label>
        <input type="text" name="searchstr" value="<?php if(isset($_GET['searchstr'])){echo $_GET['searchstr'];} ?>" />
        <input type="submit" value="Search" /></form>
    
        
        <?php
		
		/*if(isset($_GET['state'])){
			if($_GET['state'] == "del"){
				$del_query = "DELETE FROM `members` WHERE cma_no = {$_GET['cma_no']}";
				$del_query2 = "DELETE FROM `users` WHERE cma_no = {$_GET['cma_no']}";
				
				$result = mysql_query($del_query, $connection);
				$result2 = mysql_query($del_query2, $connection);
				
			}	
		}
		*/
		
		if(isset($_GET['searchstr'])){
			$searchstr = $_GET['searchstr'];
			
			$selquery = "SELECT * FROM  `contributions` WHERE cma_no = {$_GET['searchstr']} LIMIT 0 , 30";
			$rs = mysql_query($selquery,$connection);
			
			$tabledata = "<table border=\"1\" class = \"memberdata\"><tr><th>Amount</th><th>Date</th></tr>";
			$total_contribution = 0;
			while ($contribution = mysql_fetch_array($rs)) {
				$total_contribution += $contribution['amount'];
				$tabledata .= "<tr><td>" . $contribution['amount'] . "</td>";
				$tabledata .= "<td>" . $contribution['date'] . "</td>";
				$tabledata .= "</tr>";
			}
			
			$tabledata .= "</table>";
			
			echo $tabledata;
			echo "<br/>Total Contribution:" . $total_contribution;
			
		}
			
			
			

			
			
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

