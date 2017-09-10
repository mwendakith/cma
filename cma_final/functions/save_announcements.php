<?php require("../includes/connection.php");?>
<?php include("../includes/functions.php");?>

<?php

$announcement = $_POST['Announcement'];
$table_name = $_POST['Table'];
$id = $_POST['Division'];
$colname = $_POST['Table_ID'];

$sql = "UPDATE `{$table_name}` SET `Announcements`='{$announcement}' WHERE `{$colname}`='{$id}'";
mysql_query($sql);
redirect_to("../announcements.php");

?>