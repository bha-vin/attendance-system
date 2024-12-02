
<?php
   session_start(); 
   include_once "configure.php";
   $outgoing_id ="";   
   $outgoing_id = $_SESSION['unique_id'];
   $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$outgoing_id}");
     $row = mysqli_fetch_assoc($sql);
   $output = "";
   if(mysqli_num_rows($sql) > 0) {
   	    
   	   		$output .='<div>'.$row['fname'].'</div><div>'.$row['unique_id'].'</div>';
   }
   echo $output;

if(isset($_POST['mark']))
{
 include_once"configure.php";
	$d=date ('d-m-20y');
	
	echo $d ;
	$n= $row['fname'];
	$b= $_POST['branch'];	
	$p= $_POST['present'];
	
	$sql="INSERT INTO `attendance`(`name`,  `branch`,`present`,`date`) VALUES ('$n','$b','$p','$d')";
	$res= mysqli_query($conn,$sql);
	if(!$res)
 {
 die('Could not connect: ');
 }
 echo '    !!! Record added !!!';
	mysqli_close($conn);
}
?>