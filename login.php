<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styleattendance6.css">
</head>
<body>
<div class="wrapper">
	<section class="form login">
		<header>Login</header>
		<form action="" method="Post" enctype="multipart/form-data">
			<div class="error-text"></div>
			<div class="field input">
				<label>Email</label>
				<input type="text" name="email" placeholder="Enter your email Addrress">
			</div>
			<div class="field input">
				<label>Password</label>
				<input type="password" name="password" placeholder="Enter New Password">
				<i>show</i>
			</div>
			<div>
	            <input type="radio" name="permeation", value="student"/><t>Login as a Student<t>
				<input type="radio" name="permeation", value="teacher"/><t>Login as a Teacher<t>
			</div>
			<div class="field button">
				<input type="Submit" name="" value="Login">
			</div>
			<div class="link">Create a new account? - - -<a href="index.php">Sign-Up Now</a></div>
		</form>
	</section>
</div>

<script src="java/hide.js"></script>
<script src="java/login.js"></script>

</body>
</html>