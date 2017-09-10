<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_CMA = "localhost";
$database_CMA = "cma";
$username_CMA = "root";
$password_CMA = "";
$CMA = mysql_pconnect($hostname_CMA, $username_CMA, $password_CMA) or trigger_error(mysql_error(),E_USER_ERROR); 
?>