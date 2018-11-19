<?php
error_reporting(); 
ini_set('dispay_errors', TRUE);

//including the database connection file
include("config.php");
 $close_task = mysqli_query($mysqli, "SELECT * FROM taskclose ORDER BY close_id DESC");
 //$close_id = $_GET('close_id');

if(isset($_POST['Close'])) {	

$close_task = mysqli_query($mysqli, "INSERT INTO taskclose SELECT * FROM tasklist WHERE id = '1';
									DELETE FROM tasklist WHERE id = '1';");

header('Location: ../task_management/index.php');
}

?>
<html>
	<body>
		<head>
		</head>

				<ul id="closed-tasks">
								<table width='90%' border=0>

											<tr bgcolor='#CECECE'>
												<td>Task Name</td>
												<td>Task Date</td>
												<td>Re-Open</td>
												<td>Cancel</td>
											</tr>
											<?php 
												while($close = mysqli_fetch_array($close_task)) { 		
													echo "<tr>";
													echo "<td>".$close['close_title']."</td>";
													echo "<td>".$close['close_date']."</td>";	
													echo "
														  <td><a href=\"index.php?id=$close[close_id]\"
														  	 <i class=\"material-icons\">folder_open</i></a></td>
														  <td><a href=\"cancel-task.php?id=$close[close_id]\"><i class=\"material-icons\">close</i></a></td>";
													}
											?>
						</table>
					</ul>
		</body>
</html>


