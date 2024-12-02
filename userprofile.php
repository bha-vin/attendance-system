<?php 
 session_start();
   if (isset($_SESSION['unique_id'])) {

   }

include_once"configure.php";
 $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}'");
   		       if (mysqli_num_rows($sql) > 0){
   			      $row = mysqli_fetch_assoc($sql);
   		       }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wrapper">
	<section class="chat-area">
		<header>

			<?php
			   include_once"configure.php";
   		       $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id
   		   }'");
   		         $sql = mysqli_query($conn, "SELECT * FROM teachers WHERE unique_id = '{$user_id
   		   }'");
   		       if (mysqli_num_rows($sql) > 0){
   			      $row = mysqli_fetch_assoc($sql);
   		       }
			?>

			
			<input type="text" name="uplode_id" value="<?php echo $user_id; ?>" hidden>
			
				
				<div class="details">
					<span><?php echo $row['fname'] ." ".$row['lname'] ?></span>
					<p><?php echo $row['status']?></p>
				</div>
			
		
		</header>
		<div class="user-list" style="display: flex;position: relative;flex-wrap: wrap;flex-direction: row,column;">
               <?php 
	                 include_once"configure.php";
	                $sqle = "SELECT * FROM uplode WHERE uplode_id = {$user_id}";
                 	$result=mysqli_query($conn,$sqle);
	                $imgoutput = "";
	                $imgoutput_id = "";
	                $vidoutput = "";
	                $text = "";
	                $output = "";
	                while ($row = mysqli_fetch_array($result)) {
	                   	if (!empty($row['image'])){
			                 
		                    $imgoutput .='<div style="padding:5px;">
		                                  <img height= auto width=130px; src='.$row['image'].'>
		                                  </div>';
		                }                  
		                if (!empty($row['video'])){
			                 
		                    $vidoutput .= '<div style="padding:5px;"> <video height= auto width=130px;  controls>
		                                  <source src=' .$row['video']. ' type=video/webm>
		                                  </video></div>';
		                }      
		                if (!empty($row['text'])){
			                 
		                    $text.=$row['text'];
		                }        		                
		                
		                echo $imgoutput;
		                echo $vidoutput; 
		                echo $text;
		                
		                $imgoutput ="";
		                $vidoutput = "";
		                $text = "";
                	}
	            ?>
	 
		</div>
		<div style="height: 45px; width: 100%;">

		</div>
	</section>
</div>
</body>
</html>