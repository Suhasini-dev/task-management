<?php
error_reporting(); 
ini_set('dispay_errors', TRUE);
//including the database connection file
include("config.php");




if(isset($_POST['Cancel'])) {	


$cancel_task = mysqli_query($mysqli, "INSERT INTO taskcancel (cancel_id, cancel_title, cancel_date, cancel_description)
									  VALUES('$cancel_title','$cancel_date','$cancel_description')");


}

?>