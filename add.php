<html>
<head>
	<title>Add Data</title>
	<?php $title = "Task Manager"; ?>
	<?php $metaDescription = ""; ?>
	<?php include "header.php"; ?>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

function dateInput()
{


	
}



if(isset($_POST['Submit'])) {	
	$taskTitle = mysqli_real_escape_string($mysqli, $_POST['taskTitle']);
	$taskDate= mysqli_real_escape_string($mysqli, $_POST['taskDate']);
	$taskDescription = mysqli_real_escape_string($mysqli, $_POST['taskDescription']);
		
	// checking empty fields
	if(empty($taskTitle) || empty($taskDate) || empty($taskDescription)) {
				
		if(empty($taskTitle)) {
			echo "<font color='red'>Task Name field is empty.</font><br/>";
		}
		
		if(empty($taskDate)) {
			echo "<font color='red'>Task Date field is empty.</font><br/>";
		}
		
		if(empty($taskDescription)) {
			echo "<font color='red'>Task Description field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "Please enter all fields";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO tasklist(taskTitle,taskDate,taskDescription) 
										 VALUES('$taskTitle','$taskDate','$taskDescription')");
		
		header('Location: index.php');
	}
}
?>
</body>
</html>