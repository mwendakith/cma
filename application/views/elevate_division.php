<div class="content">
<h2>Elevate Division</h2>
<p>Welcome to the page where you can elevate the status of the division.</p>

<form  method="post" action="<?php echo site_url('admin_pages/reg_elevation'); ?>">

<label for="Division_level">Select the division you are elevating.</label>
<select name="Division_level" id="div_level" onchange="get_name(this.value)">
<option value=""></option>

<option value=3>Diocese</option>
<option value=4>Deanery</option>
<option value=5>Parish</option>
<option value=6>Outstation</option>
</select>
<br />
<br />


<label for="Division_id">Select the division</label>
<select name="Division_id" id="suggestions">

</select>
<br />
<br />

<input type="submit"  value="Elevate" />


</form>


</div>

<script src="<?php echo base_url('javascripts/jquery-2.1.1.min.js') ?>" type="text/javascript" charset="utf-8"> 
    
    </script>


<script >
function get_name(variable){
	
	var table_name;
        var table_id;
	
	
	if(variable == 3){
		table_name = "diocese";
                table_id = "diocese_id";
	}
	
	else if(variable == 4){
		table_name = "deanery";
                table_id = "deanery_id";
		
	}
	
	else if(variable == 5){
		table_name = "parish";
                table_id = "parish_id";
	}
	
	else if (variable == 6){
		table_name = "outstation";
                table_id = "outstation_id";
	}
	
	
	var form_data = {
            table: table_name,
            primary: table_id
        };
        
        $.ajax({
            url: "<?php echo site_url('admin_pages/elevation_options'); ?>",
            type: 'POST',
            data: form_data,
            success: function(msg){
                $("#suggestions").empty().append(msg);
            }
        });
	
}

</script>
