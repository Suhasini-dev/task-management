<?php

error_reporting(); 
ini_set('dispay_errors', TRUE);
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM tasklist ORDER BY id DESC"); // using mysqli_query instead

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
			<ul id ="open-tasks">
				<div id="taskInfo1"  class="toggle" >
					<?php include "../task_management/add.html"; ?>
				
					<table width='90%' border=0>

						<tr bgcolor='#CECECE'>
							<td>Task Name</td>
							<td>Task Date</td>
							<td>Edit</td>
							<td>Delete</td>
							<td>Close</td>
							<td>Cancel</td>
						</tr>
						<?php 
						while($res = mysqli_fetch_array($result)) { 

							echo "<tr>";
							echo "<td>".$res['taskTitle']."</td>";
							echo "<td>".$res['taskDate']."</td>";
							echo "<td><a href=\"edit.php?id=$res[id]\"><i class=\"material-icons\">edit</i></a></td>
								  <td><a href=\"delete-task.php?id=$res[id]\"  onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"material-icons\">delete</i></a></td>
								  <td><div id=\"close\" class=\"close-item\" onclick=\"closeTask\"><i class=\"material-icons\">check</i></div></td>
								  <td><div id =\"cancel\" onclick=\"cancelTask\"><i class=\"material-icons\">cancel</i></div></td>";
							}
						?>
					</table>
				  </ul>
				</div>

				<div id="taskInfo2"  class="toggle" style="display:none;">

					<?php include "../task_management/close-task.php"; ?>
					



				</div>
				<div id="taskInfo3"  class="toggle" style="display:none;">
					<?php include "../task_management/cancel-task.php"; ?> 
					
				</div>
	</section>


	
	</body>
</html>
<script type="text/javascript">
		function closeTask() {
		    var node = document.getElementById("closed-tasks").lastChild;
		    var list = document.getElementById("open-tasks");
		    list.insertAfter(node, list.childNodes[0]);
		}


		
		function cancelTask() {
		    var x = document.getElementById("cancelled-tasks").lastChild;
		    var y = document.getElementById("open-tasks");
		    list.insertBefore(x, y.childNodes[0]);
		}

</script>