<?php 


   session_start();
   include_once"configure.php";
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $permeation = mysqli_real_escape_string($conn, $_POST['permeation']);


   if (!empty($email) && !empty($password)) {
      if ($permeation=="student") {
   	  $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
   		if (mysqli_num_rows($sql) > 0){
   			$row = mysqli_fetch_assoc($sql);
   	      	$_SESSION['unique_id'] = $row['unique_id'];
               $_SESSION['branch'] = $row['branch'];
   			echo "succes";
   		}
   		else{
   			echo "email or password are incorrect!";
   		}
      }
      elseif ($permeation=="teacher") {
         $sql = mysqli_query($conn, "SELECT * FROM teachers WHERE email = '{$email}' AND password = '{$password}'");
         if (mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
               $_SESSION['unique_id'] = $row['unique_id'];
            echo "teachers";
         }
         else{
            echo "email or password are incorrect!";
         }
      }
      else{
         echo "please select where you want to login";
      }
   }
   else{
   	  echo "all field are required";
   }
?>