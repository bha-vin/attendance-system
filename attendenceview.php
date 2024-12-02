<?php 
   session_start();
   if (isset($_SESSION['branch'])) {
  
   $outgoing_id = $_SESSION['branch'];
   }
?>
<?php  
include_once "configure.php";
 $subject = mysqli_real_escape_string($conn, $_GET['subject']);
   		       $sql = mysqli_query($conn, "SELECT * FROM subject_teachers WHERE subject = '{$subject}'");
   		       if (mysqli_num_rows($sql) > 0){
   			      $row = mysqli_fetch_assoc($sql);
   			      $branch = $row['branch'];
   			     
   		       }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>	
	<link rel="stylesheet" type="text/css" href="styleattendance6.css">
</head>
<body>
	<div style=" width:520px; height: 100%; background: #f00; padding: 10px;"> 	

    <div class="subject">
    	<header>
    		
			<div  class="searchicon">Q</div>

			<a  class="uplode"  href="public.php?branch=<?php echo $branch;?>" style="height: 30px; float: right;margin-top: 10px; margin-left:12px;"><div style="width: 100px;height: 30px;border-radius: 5px;background: #eee;padding-top:10px;font-size: 14px;color: #000;text-align: center;">UPLODE</div> </a>
		</header>
		<div style="height: auto;width: 100%;">
		  	<div class="search">
			    <span class="text"></span>
			    <input type="text" name="" placeholder="Enter name to search...">
			    <button style="float: right;"><i>X</i></button>

		    </div>
		</div>

<div class="subject-icon">
<?php 
include_once"configure.php";
 $subject = mysqli_real_escape_string($conn, $_GET['subject']);
 
 $_SESSION['subject']=$subject;
 
 


?>
</div>
</div>
</div>
</body>

<script src="java/attendanceview.js"></script>
</html>