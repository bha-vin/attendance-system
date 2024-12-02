<html>
<form  action="attendance1.php" method="POST">
 <body background="https://thumbs.dreamstime.com/z/blur-classroom-education-background-empty-school-class-lecture-room-interior-view-no-teacher-student-200041016.jpg";>
</body>
	<?php
   session_start(); 
   include_once "configure.php";
   $outgoing_id ="";   
   $outgoing_id = $_SESSION['unique_id']; 
   $branch = "";   
   $branch = $_SESSION['branch'];
   $sql = mysqli_query($conn, "SELECT * FROM permeation WHERE subclass = '{$branch}'");
  
   $output = "";
   if(mysqli_num_rows($sql) > 0) {
   	    
   	   		
   	   		while ($row = mysqli_fetch_array($sql)) { 
		                   $output .='<div>Subject : <input type="radio" name="branch", value="'.$row['subject'].'" required/><t>'.$row['subject'].'<t></div>'; 
		                
		            }
		             echo $output;
   	   		 
   }   
  ?>
  <p>
  	
	 Mark : <input type="radio" name="present", value="Present"/><t>Present   <t>
	 <input type="radio" name="present", value="Absent"/><t>Absent   <t><br><br>
	 <input type="submit" name="mark" Value="Submit"/>
  </p>
</form>
<a href="public.php?branch=<?php echo $branch;?>"><div style="background: #bbb; height: 30px; width: 80px;border-radius: 8px;text-align: center;">uplode</div></a>
</html>
