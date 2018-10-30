<?php
error_reporting(); 
ini_set('dispay_errors', TRUE);

//including the database connection file
include("config.php");
 
 //$close_id = $_GET('close_id');

if(isset($_POST['Close'])) {	

$close_task = mysqli_query($mysqli, "INSERT INTO taskclose (close_title, close_date, close_description)
									VALUES('$close_title','$close_date','$close_description')");

header('Location: index.php');
}

?>