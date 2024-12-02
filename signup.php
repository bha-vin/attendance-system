<?php 
   session_start();
   include_once"configure.php";
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $permeation = mysqli_real_escape_string($conn, $_POST['permeation']);
   $join_code = mysqli_real_escape_string($conn, $_POST['join_code']);

   if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
   	if (filter_var($email, FILTER_VALIDATE_EMAIL)){
       if ($permeation=="teacher") {
         $sql4 = mysqli_query($conn, "SELECT code FROM permeation WHERE subject = '{$permeation}'");
         $row = mysqli_fetch_assoc($sql4);
         if (mysqli_num_rows($sql4) > 0) {
            if ($join_code==$row['code']) {
              
               # code...
            
          # code...

         $sql = mysqli_query($conn, "SELECT email FROM teachers WHERE email = '{$email}'");
         if (mysqli_num_rows($sql) > 0) {
            echo "$email this email address is already exist";

         }
          else{
                     $status = "Active now";
                     $random_id = rand(time(),10000000);

                     $sql2 = mysqli_query($conn,"INSERT INTO teachers (unique_id, fname, lname, email, password, status) VALUES ('{$random_id}','{$fname}','{$lname}','{$email}','{$password}','{$status}')");
                     if ($sql2) {
                        $sql3 = mysqli_query($conn, "SELECT * FROM teachers WHERE email ='{$email}' ");
                        if (mysqli_num_rows($sql3) > 0){
                           $row = mysqli_fetch_assoc($sql3);
                           $_SESSION['unique_id'] = $row['unique_id'];
                         
                           echo "teachers";
                        }
                     }
                     else{
                        echo "something went wrong";
                     
                     }              

                }
          }
          
         else{
          echo "join code was wrong";
         }

         }      
       }
       else{
         $sql4 = mysqli_query($conn, "SELECT code FROM permeation WHERE subject = '{$permeation}'");
         $row = mysqli_fetch_assoc($sql4);
         if (mysqli_num_rows($sql4) > 0) {
            if ($join_code==$row['code']) {
          # code...
       
   		$sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
   		if (mysqli_num_rows($sql) > 0) {
   			echo "$email this email address is already exist";

   		}
   		 else{
   			    		$status = "Active now";
   			    		$random_id = rand(time(),10000000);

   			    		$sql2 = mysqli_query($conn,"INSERT INTO users (unique_id,branch, fname, lname, email, password, status) VALUES ('{$random_id}','{$permeation}','{$fname}','{$lname}','{$email}','{$password}','{$status}')");
   			    		if ($sql2) {
   			    			$sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$email}' ");
   			    			if (mysqli_num_rows($sql3) > 0){
   			    				$row = mysqli_fetch_assoc($sql3);
   			    				$_SESSION['unique_id'] = $row['unique_id'];
                    $_SESSION['branch'] = $row['branch'];
   			    				echo "succes";
   			    			}
   			    		}
   			    		   			   

   			    }
         }
         else{
          echo "join code was wrong";
         }
       }
   	 }
   	}
   	else{
   		echo "$email this email is not valide";
   	}
   }
   else{
   	echo "all field are required";
   }
?>