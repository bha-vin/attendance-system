<?php 

  session_start();

if (isset($_POST['submit'])) {
   include_once"configure.php";
   $fname = "";
   $lname = "";
   $teacher_id = mysqli_real_escape_string($conn, $_POST['teacher_id']);
   $subject = mysqli_real_escape_string($conn, $_POST['subject']);
   $branch = mysqli_real_escape_string($conn, $_POST['branch']);
   $subject_code = mysqli_real_escape_string($conn, $_POST['subject_code']);

$sql4 = mysqli_query($conn, "SELECT code FROM permeation WHERE subclass = '{$branch}' AND subject = '{$subject}'");
         $row4 = mysqli_fetch_assoc($sql4);
         if (mysqli_num_rows($sql4) > 0) {
            if ($subject_code == $row4['code']) {

               $sql3 = mysqli_query($conn, "SELECT * FROM teachers WHERE unique_id = '{$teacher_id}'");
               $row3 = mysqli_fetch_assoc($sql3);
               if (mysqli_num_rows($sql3) > 0) {
                   $fname = $row3['fname'];
                   $lname = $row3['lname'];
                }  

            $sql="INSERT INTO subject_teachers(teacher_id,first_name,last_name,branch,subject) VALUES('{$teacher_id}','{$fname}','{$lname}','{$branch}','{$subject}')";
	         $result = mysqli_query($conn,$sql);
	        if($result){
	            echo"record inserted";
               }

            }
            else{
            	echo "subject code was wrong";
            }
         }
         else{
         	echo "subject name was wrong";
         }

}

?>