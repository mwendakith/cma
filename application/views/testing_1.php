<html>
<head>


</head>
<body>

     
<label for="Division_level">Select the division you are making</label>
<select name="Division_level" id="div_level" onchange="get_key(this.value)">
<option value=""></option>
<option value=2>Archdiocese</option>
<option value=3>Diocese</option>
<option value=4>Deanery</option>
<option value=5>Parish</option>
<option value=6>Outstation</option>
</select>

<br  />
<br  />

<label for="Division_name">Enter the name of the division.</label>
<input type="text" name="Division_name"  />

<br />
<br />

<label for="key">Select the division</label>
<select name="key" id="suggestions">

</select>
 <?php // echo base_url('javascripts/jquery-2.1.1.min.js');
 // echo "http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js";?> 
<script src="<?php echo base_url('javascripts/jquery-2.1.1.min.js') ?>" type="text/javascript" charset="utf-8"> 
    
    </script>
    <script>
function get_key(variable){
        
       
    
	var foreign_key;
        var primary_key;
	if(variable == 2){
		foreign_key = "nation";
                primary_key = "nation_id";
	}
	
	else if(variable == 3){
		foreign_key = "archdiocese";
                primary_key = "archdiocese_id";
	}
	
	else if(variable == 4){
		foreign_key = "diocese";
                primary_key = "diocese_id";
		
	}
	
	else if(variable == 5){
		foreign_key = "deanery";
                primary_key = "deanery_id";
	}
	
	else if (variable == 6){
		foreign_key = "parish";
                primary_key = "parish_id";
                
	}
	
	var form_data = {
            table: foreign_key,
            primary: primary_key
        };
        
        $.ajax({
            url: "<?php echo site_url('admin_pages/division_options'); ?>",
            type: 'POST',
            data: form_data,
            success: function(msg){
                $("#suggestions").empty().append(msg);
            }
        });
        
        
       
        

    
}

</script>

</body>
</html>

