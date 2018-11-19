<?php
error_reporting(); 
ini_set('dispay_errors', TRUE);
//including the database connection file
include("config.php");
if(isset($_POST['Cancel'])) {	


$cancel_task = mysqli_query($mysqli, "INSERT INTO taskcancel (cancel_id, cancel_title, cancel_date)
									  VALUES('$cancel_title','$cancel_date')");
}

?>
<ul id="cancelled-tasks">
		<table width='90%' border=0>

								<tr bgcolor='#CECECE'>
									<td>Task Name</td>
									<td>Task Date</td>
								</tr>
								<?php 
									while($cancel = mysqli_fetch_array($cancel_task)) { 		
										echo "<tr>";
										echo "<td>".$cancel['cancel_title']."</td>";
										echo "<td>".$cancel['cancel_date']."</td>";	
										}
								?>
		</table>
</ul>