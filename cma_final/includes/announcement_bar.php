

<?php
$outstation = $_SESSION['Outstation_ID'];
$parish = $_SESSION['Parish_ID'];
$deanery = $_SESSION['Deanery_ID'];
$diocese = $_SESSION['Diocese_ID'];
$archdiocese = $_SESSION['Archdiocese_ID'];

$announcement_string = "<h3> Announcements </h3>";

// Echoes the announcements of the Nation
$sql1 = "SELECT * FROM `Nation` WHERE `Nation_ID`=1";
$result = mysql_query($sql1);
$row = mysql_fetch_array($result);
$announcement_string .= "<h4>" . $row['name'] . "</h4><br />";
$announcement_string .= "{$row['announcements']}" . "<br /><br />";



// Echoes the announcements of the Archdiocese
$sql2 = "SELECT * FROM `Archdiocese` WHERE `Archdiocese_ID`='{$archdiocese}'";
$result = mysql_query($sql2);
$row = mysql_fetch_array($result);
$announcement_string .= "<h4> " . $row['name'] . "</h4><br />";
$announcement_string .= "{$row['announcements']}" . "<br /><br />";


// Echoes the announcements of the diocese
$sql3 = "SELECT * FROM `Diocese` WHERE `Diocese_ID`='{$diocese}'";
$result = mysql_query($sql3);
$row = mysql_fetch_array($result);
$announcement_string .= "<h4>" . $row['name'] . "</h4><br />";
$announcement_string .= "{$row['announcements']}" . "<br /><br />";


// Echoes the announcements of the Deanery
$sql4 = "SELECT * FROM `Deanery` WHERE `Deanery_ID`='{$deanery}'";
$result = mysql_query($sql4);
$row = mysql_fetch_array($result);
$announcement_string .= "<h4>" . $row['name'] . "</h4><br />";
$announcement_string .= "{$row['announcements']}" . "<br /><br />";


// Echoes the announcements of the Parish
$sql5 = "SELECT * FROM `Parish` WHERE `Parish_ID`='{$parish}'";
$result = mysql_query($sql5);
$row = mysql_fetch_array($result);
$announcement_string .= "<h4>" . $row['name'] . "</h4><br />";
$announcement_string .= "{$row['announcements']}" . "<br /><br />";
mysql_free_result($result);

// Echoes the announcements of the Outstation
$sql6 = "SELECT * FROM `Outstation` WHERE `Outstation_ID`='{$outstation}'";
$result = mysql_query($sql6);
$row = mysql_fetch_array($result);
$announcement_string .= "<h4>" . $row['name'] . "</h4><br />";
$announcement_string .= "{$row['announcements']}" . "<br /><br />";



?>