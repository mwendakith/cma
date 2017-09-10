
<?php include("includes/session.php");?>
<?php include("includes/functions.php");?>
<?php require("includes/connection.php");?>
<?php include("includes/announcement_bar.php");?>
<?php 
	$page = "registration";
	if($_SESSION['Post_ID'] != 9){
		redirect_to("homepage.php");
	}

	
	if(isset($_GET['state'])){
		if($_GET['state'] == "contribute"){
			$query = "INSERT INTO `cma`.`contributions`(`id`, `cma_no`, `amount`, `date`) ";
			$query .= "VALUES('','{$_POST['CMA_No']}','{$_POST['Amount']}','" . date("Y-m-d") . "' )";
			
			$result = mysql_query($query, $connection);
			
			if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				die($message);
			}
		}
	}
	
	$selquery = "SELECT * FROM contributions WHERE cma_no = {$_GET['cma_no']} AND date > " . date("Y-m") . "-00";
	echo $selquery;
	$result2 = mysql_query($selquery, $connection);
	
	$total_contribution = 0;
	if(mysql_num_rows($result2)){
		while($contribution = mysql_fetch_array($result2)){
			$total_contribution += $contribution['amount'];
		}
	}
	
	

	include("includes/header.php");
?>
<?php include("includes/sidebar.php");?>
<script type="text/javascript">
	function validateForm(){
		var sendForm = true;
		var fields = document.getElementsByClassName("reqd")
		
		for(var i = 0; i < fields.length; i++) {
        if(!fields[i].value) {
            fields[i].style.border = "#F00 solid";
            sendForm = false;
        }
        else {
            //Else block added due to comments about returning colour to normal
            fields[i].style.border = "inherit";
        }
		
		if(isNaN(document.getElementById("amount").value)){
			sendForm = false;
		}
    }
	return sendForm;
		
		
		
		/*if(document.getElementsByName("CMA_No").value == "" || document.getElementsByName("CMA_No").value == null){
			//document.getElementsById("CMA_No").className += " invalid";
			document.getElementById("CMA_No").style.border = "#F00 solid";
			//document.getElementsById("CMA_No")
			return false;
			
		}
		*/
		
	}

</script>
<div class="middle">
<?php
	echo $sidebar;
?>

<div class="content">

        <h2>Contribution</h2>
        
       
        <?php echo " Contribution so far for the month " . date("F") . " is " . $total_contribution ?>
         <p> Enter a contribution for the month <?php echo date("F"); ?>.</p> <br />
        <form onsubmit="return validateForm()" action="contribution.php?state=contribute&amp;cma_no=<?php echo $_GET['cma_no'] ?>" method="post" name="member_reg" enctype="multipart/form-data">
         
         <table>
         	<tr>
                <td><label class="txtbxlabel" for="CMA_No">CMA number:</label></td>
                <td><input id="CMA_No" class="reqd txtbx" name="CMA_No" type="text" 
				<?php 
				if(isset($_GET['cma_no'])){ 
					echo "value=\"{$_GET['cma_no']}\"";
				} 
				?>
                maxlength="20" /></td>
            </tr>
            
            <tr>
                <td><label class="txtbxlabel" for="First_Name">Amount: </label></td>
                <td><input class="reqd txtbx" id="amount" name="Amount" type="text" maxlength="15" /></td>
            </tr>
            
            <tr>
         	       <td><input type="submit" value="Confirm Contribution	" /></td>
                
            </tr>
        
            </table>
        </form>
        
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

