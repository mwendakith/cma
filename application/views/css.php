<style>
@charset "utf-8";
/* CSS Document */


html { height: 100%; width: 100%; }

body {
	width: 100%;
	height: 100%;
	margin: 0px;
	padding: 0px;
	border: 0px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	line-height: 15px;
}

.container{
	width: 100%;
	/*margin: auto;*/
	background-color: #CCC;	
}

.sidebar1{
	text-align:right;
	border:solid #333333 thin;
	position:static;
	float: left;
	width: 15%;
	
	background:#87a1ba;
		
}

.header a{
	color:#FFF;
	
	
	
}

.sidebar1 a { color: #1A446C; text-decoration: none; display: block; padding:4px; font-weight: bold; }

img { border: none; }

div { border-collapse: collapse; vertical-align: top; font-size: 13px; line-height: 15px;}


.header {
	
	position:static;
	height: 70px; 
	margin: 0px; 
	padding: 0px; 
	text-align: left; 
        <?php
	echo "background: '" . base_url('images/headerimg.png') . "'; ";
        ?>
	color: #D4E6F4;
}

#heading{
	
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size:14px;
	float:left;
	width:40%;
}

#heading a{
	text-decoration:none;
}

#currloggedin{
	font-weight:bold;
	float:right;
	text-align:right;
	width:60%;
	color:#FFF;
}

.header h1 { padding: 1em; margin: 0px; text-decoration: none}

.middle { width: 100%; background: #EEE4B9; border:solid thin; }

.footer { 
	clear: both;
    position: relative;
    z-index: 10;
    height: 3em;
    margin-top: -3em; 
	padding: 10px;
	text-align: center; 
	background: #1A446C;  
	color: #D4E6F4;
	border:solid thin;
}

/* Navigation */






ul { padding-left: 0; list-style: none; }





li{
	border-bottom:solid thin ;
	width:100%;
	display:block;
}

.sidebar1 a:hover{
	color: #87a1ba;
	background-color:#1A446C;
}




.selected {
	
	font-weight: bold;
	background-color: #DDC591;
	color: #000;
	
}

.sidebar2{
	border:solid thin;
	float: right;
	width: 15%;
	min-height:600px;
	padding: 10px;
	font-size:9px;
	text-align:right;
	position: static;
	background-color: #E2E0E0;
}

.sidebar2 h3{
	font-weight:bold;
	font-size:15px;
}

/* Page Content */
.content { 
	
	padding: 10px;
	border:solid thin;
	float: left;
	width: 66.55%;
	background-color: #FFF;
	min-height:600px;
}
	
.content h2 { color: #8D0D19; margin-top: 1em;}

.content h3 { color: #8D0D19; }

.memberdata{
	border:#930;
	font-size:9px;
}

th{
	background-color:#DDC591;
	
	}

td a{
	color:#930;
	}

.sbtable{
	width:50%;
	
}

.sbtable th{
	font-size:36px;
	
}

.viewmemtable{
	border:#930;
}

.viewmemtable td{
	padding:3px;		
}

.viewmemtable td img{
	border:solid;
	margin-left:10px;
}

</style>