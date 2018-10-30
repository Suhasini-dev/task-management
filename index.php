<?php

error_reporting(); 
ini_set('dispay_errors', TRUE);
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM tasklist ORDER BY id DESC"); // using mysqli_query instead
$close_task = mysqli_query($mysqli, "SELECT * FROM taskclose ORDER BY close_id DESC");
$cancel_task = mysqli_query($mysqli, "SELECT * FROM taskcancel ORDER BY cancel_id DESC");






?>

<html>
<head>	
	<title>Homepage</title>
	<?php $title = "Task Manager"; ?>
	<?php $metaDescription = ""; ?>
	<?php include "header.php"; ?>
</head>

<body>

	<section class=" center-align">
			<div class="task-headings">
				<div class="task_list">
						<a href="#taskInfo1">
							<h3>Open</h3>
						</a>
				</div>
				<div class="task_list">
					<a href="#taskInfo2">
						<h3>Closed</h3>
					</a>	
				</div>
				<div class="task_list">
					<a href="#taskInfo3">
						<h3>Cancelled</h3>
					</a>	
				</div>
			</div>
				<div id="taskInfo1"  class="toggle" >
					<?php include "../task_management/add.html"; ?>

					<table width='80%' border=0>

						<tr bgcolor='#CECECE'>
							<td>Task Name</td>
							<td>Task Date</td>
							<td>Task Description</td>
							<td>Edit</td>
							<td>Delete</td>
							<td>Closed</td>
							<td>Cancel</td>
						</tr>
						<?php 
						while($res = mysqli_fetch_array($result)) { 		
							echo "<tr>";
							echo "<td>".$res['taskTitle']."</td>";
							echo "<td>".$res['taskDate']."</td>";
							echo "<td>".$res['taskDescription']."</td>";	
							echo "<td><a href=\"edit.php?id=$res[id]\" ><i class=\"material-icons\">edit</i></a></td>
								  <td><a href=\"delete-task.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"material-icons\">delete</i></a></td>
								  <td><a href=\"close-task.php?id=$res[id]\" ><i class=\"material-icons\">close</i></a></td>
								  <td><a href=\"cancel-task.php?id=$res[id]\"><i class=\"material-icons\">cancel</i></a></td>";
							}
						?>
					</table>
				</div>

				<div id="taskInfo2"  class="toggle" style="display:none;">

					<?php include "../task_management/close-task.php"; ?>
					<table width='80%' border=0>

						<tr bgcolor='#CECECE'>
							<td>Task Name</td>
							<td>Task Date</td>
							<td>Task Description</td>
							<td>Re-Open</td>
							<td>Cancel</td>
						</tr>
						<?php 
							while($close = mysqli_fetch_array($close_task)) { 		
								echo "<tr>";
								echo "<td>".$close['close_title']."</td>";
								echo "<td>".$close['close_date']."</td>";
								echo "<td>".$close['close_description']."</td>";	
								echo "
									  <td><a href=\"index.php?id=$close[close_id]\"
									  	 <i class=\"material-icons\">folder_open</i></a></td>
									  <td><a href=\"cancel-task.php?id=$close[close_id]\"><i class=\"material-icons\">close</i></a></td>";
								}
						?>
					</table>



				</div>
				<div id="taskInfo3"  class="toggle" style="display:none;">
					<?php include "../task_management/cancel-task.php"; ?> 
					<table width='80%' border=0>

						<tr bgcolor='#CECECE'>
							<td>Task Name</td>
							<td>Task Date</td>
							<td>Task Description</td>
						</tr>
						<?php 
							while($cancel = mysqli_fetch_array($cancel_task)) { 		
								echo "<tr>";
								echo "<td>".$cancel['cancel_title']."</td>";
								echo "<td>".$cancel['cancel_date']."</td>";
								echo "<td>".$cancel['cancel_description']."</td>";	
								}
						?>
					</table>
				</div>
	</section>


	
	</body>
</html>