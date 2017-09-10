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

<script src=" <?php echo base_url('javascripts/jquery-1.11.0.js'); ?> "> </script>

<script>
    
    
function get_key(variable){
        
       
    
	var foreign_key;
	if(variable == 2){
		foreign_key = "nation";
	}
	
	else if(variable == 3){
		foreign_key = "archdiocese";
	}
	
	else if(variable == 4){
		foreign_key = "diocese";
		
	}
	
	else if(variable == 5){
		foreign_key = "deanery";
	}
	
	else if (variable == 6){
		foreign_key = "parish";
	}
	
	
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("suggestions").innerHTML=xmlhttp.responseText;
	
	
    }
  }
  
  

 xmlhttp.open("POST", <?php echo site_url("adminpages/division_options"); ?>, true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xmlhttp.send("table="+foreign_key);


     // document.write(foreign_key + cow + php);
    
}

</script>

</body>
</html>