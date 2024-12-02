<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styleattendance6.css">
</head>
<body>
<div class="wrapper">
	<section class="form signup">
		<header>signup</header>
		<form action="" enctype="multipart/form-data">
			<div class="error-text"></div>
			<div class="name">
			<div class="field input">
				<label>First Name</label>
				<input type="text" name="fname" placeholder="First Name" required>
			</div>
			<div class="field input">
				<label>Last Name</label>
				<input type="text" name="lname" placeholder="Last Name" required>
			</div>
			</div>
			<div class="field input">
				<label>Email</label>
				<input type="text" name="email" placeholder="Enter your email Addrress" required>
			</div>
			<div class="field input">
				<label>Password</label>
				<input type="Password" name="password" placeholder="Enter New Password" required>
				<i>show</i>
			</div>
			<div>
	            <input type="radio" name="permeation", value="student"/ class="radio_student"><t>Sign-Up as a Student<t>
	            <input type="radio" name="permeation", value="teacher"/ class="radio_teacher"><t>Sign-Up as a Teacher<t>
			</div>
			<div class="permeation_branch">
				<?php  
				$permeation = "";
				include_once"configure.php";
 
 
	                $sqle = "SELECT * FROM permeation WHERE subclass = 'student'";
                 	$result = mysqli_query($conn,$sqle);
	       
	                while ($row = mysqli_fetch_array($result)) {
	                   
				         $permeation .='<input type="radio" name="permeation", value="'.$row['subject'].'"/><t>'.$row['subject'].'<t><br>';
		            }

				echo $permeation;

				?>
			</div>
			<div class="field input">
				<label>join-code</label>
				<input type="text" name="join_code" placeholder="join-code" required>
			</div>
			<div class="field button">
				<input type="Submit" name="" value="Sign-Up">
			</div>
			<div class="link">Already Sign-Up? - - - <a href="login.php">Login now</a></div>
		</form>
	</section>
</div>

<script src="java/hide.js"></script>
<script src="java/signup.js"></script>

</body>
</html>