<?php include("../includes/connection.php"); ?>
<?php include("../includes/functions.php"); ?>

<?php
$division_id = $_GET['divid'];
$id = $_SESSION['National_ID'];
$post = $_SESSION['Post_ID'];
$area;
$date = getdate();
$year = $date['year'];

switch($division_id){
	case 1:
		$area = 1;
		break;
	case 2:
		$area = $_SESSION['Archdiocese_ID'];
		break;
	case 3:
		$area = $_SESSION['Diocese_ID'];
		break;
	case 4:
		$area = $_SESSION['Deanery_ID'];
		break;
	case 5:
		$area = $_SESSION['Parish_ID'];
		break;
	case 6:
		$area = $_SESSION['Outstation_ID'];
		break;
	default:
		break;	
}

$sql = "DELETE FROM `election` WHERE `List_ID`={$area} AND `Post_ID`={$post} AND `ID_No`={$id};";
mysql_query($sql);

echo "You have successfully recanted your candidacy.";

?>