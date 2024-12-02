<?php 
include_once"configure.php";
session_start();
 
$subject = $_SESSION['subject'];
 
 
	                $sqle = "SELECT * FROM attendance WHERE branch = '{$subject}'";
                 	$result = mysqli_query($conn,$sqle);
	       
	                $output = "<th>Date</th><th>Name</th>";
	                while ($row = mysqli_fetch_array($result)) {
	                   	if (!empty($row['branch'])){
			                
		                    $output .='<tr><td>'.$row['date'].'</td><td>'.$row['name'].'</td></tr>';
		                } 
		            }
		            echo '<div><table border="10px;" width="480px;">'. $output .'</table></div>';


?>