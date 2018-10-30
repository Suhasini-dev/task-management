<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$taskTitle = mysqli_real_escape_string($mysqli, $_POST['taskTitle']);
	$taskDate = mysqli_real_escape_string($mysqli, $_POST['taskDate']);
	$taskDescription = mysqli_real_escape_string($mysqli, $_POST['taskDescription']);	
	
	// checking empty fields
	if(empty($taskTitle) || empty($taskDate) || empty($taskDescription)) {	
			
		if(empty($taskTitle)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($taskDate)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($taskDescription)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$edit = mysqli_query($mysqli, "UPDATE tasklist 
									   SET taskTitle='$taskTitle',taskDate='$taskDate',taskDescription='$taskDescription' 	
									   WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$edit = mysqli_query($mysqli, "SELECT * FROM tasklist 
								 WHERE id=$id");
while($res = mysqli_fetch_array($edit))
{
	$taskTitle = $res['taskTitle'];
	$taskDate = $res['taskDate'];
	$taskDescription = $res['taskDescription'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<?php $title = "Task Manager"; ?>
	<?php $metaDescription = ""; ?>
	<?php include "header.php"; ?>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
			<form name="form1" method="post" action="edit.php">
				<table border="0">
					<tr> 
						<td>Task Name</td>
						<td><input type="text" name="taskTitle" value="<?php echo $taskTitle;?>"></td>
					</tr>
					<tr> 
						<td>Task Date</td>
						<td><input type="text" name="taskDate" value="<?php echo $taskDate;?>"></td>
					</tr>
					<tr> 
						<td>Task Description</td>
						<td><input type="text" name="taskDescription" value="<?php echo $taskDescription;?>"></td>
					</tr>
					<tr>
						<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
						<td><input type="submit" name="update" value="Update Task"></td>
					</tr>
				</table>
			</form>
</body>
</html>