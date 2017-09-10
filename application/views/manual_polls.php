<div class="content">
<h2>Manual Polls</h2>
<p>Welcome to the page where you can register officials who have been elected manually.</p>
<br />
Select the division: 
<?php
        $rank = $this->session->userdata('division_id');
	echo "<select onchange='get_list(this.value)'>";
	echo "<option value=''>--Select the division--</option>";
	echo "<option value=6>Outstation</option>";
	if ($rank < 6){
		echo "<option value=5>Parish</option>";
	}
	if ($rank < 5){
		echo "<option value=4>Deanery</option>";
	}
	if ($rank < 4){
		echo "<option value=3>Diocese</option>";
	}
	if ($rank < 3){
		echo "<option value=2>Archdiocese</option>";
	}
	if ($rank < 2){
		echo "<option value=1>Nation</option>";
	}
	echo "</select>";


?>


<form action='<?php echo site_url('chair_pages/save_officials'); ?>' method='post' name='manual_voting' id='men'>

    
</form>
</div>
<script src="<?php echo base_url('javascripts/jquery-2.1.1.min.js') ?>" type="text/javascript" charset="utf-8"> 
    
    </script>


<script>
function get_list(division){
	
       var form_data = {division_id: division};
       $.ajax({
           url : "<?php echo site_url('chair_pages/manual_voting_list'); ?>",
           type: 'POST',
           data : form_data,
           success : function(msg){
               //document.write('succeed');
              $('#men').empty().append(msg);
           }
       });
       

}

</script>
