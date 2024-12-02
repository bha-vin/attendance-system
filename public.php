<?php 
include_once"configure.php";
 $branch = mysqli_real_escape_string($conn, $_GET['branch']);
?>
<?php 
  session_start();
   if (isset($_SESSION['unique_id'])) {
 

   }  
 $uplode_id = $_SESSION['unique_id'];
if (isset($_POST['upload'])) {
	//$target = "images/".basename($_FILES['image']['name']);

   	    include_once "configure.php";
	$image=$_FILES['image']['name'];
	$video=$_FILES['video']['name'];
	$text=$_POST['text'];

	$sqle="INSERT INTO uplode(branch,uplode_id,image,video,text) VALUES('$branch','$uplode_id','$image','$video','$text')";
	mysqli_query($conn,$sqle);
	
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
	<section class="user">
		<header>

			<?php
			   include_once"configure.php";
   		       $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
   		       if (mysqli_num_rows($sql) > 0){
   			      $row = mysqli_fetch_assoc($sql);
   		       }
			?>
			<?php
			   include_once"configure.php";
   		       $sql = mysqli_query($conn, "SELECT * FROM teachers WHERE unique_id = '{$_SESSION['unique_id']}'");
   		       if (mysqli_num_rows($sql) > 0){
   			      $row = mysqli_fetch_assoc($sql);
   		       }
			?>

			
			<div class="content">
			<input type="text" name="uplode_id" value="<?php echo $uplode_id; ?>" hidden>
				
				<div class="details">
					<span><?php echo $row['fname'] ." ".$row['lname'] ?></span>
				</div>
			</div>
			
		</header>
		
		<div class="user-list">
			<div class="search">
			
		</div>
                <?php 
	                 include_once"configure.php";
	                $sqle = "SELECT * FROM uplode WHERE branch = '{$branch}'";
                 	$result=mysqli_query($conn,$sqle);
	                $imgoutput = "";
	                $imgoutput_id = "";
	                $vidoutput = "";
	                $text = "";
	                $output = "";
	                while ($row = mysqli_fetch_array($result)) {
	                   	if (!empty($row['image'])){
	                        $imgoutput_id = $row['uplode_id'];
			                 
		                    $imgoutput .='<div style=padding-top:30px;type=hidden;>
		                                  <img height= auto width=100%; src='.$row['image'].'>
		                                  </div>
		                                  <form action="public.php" method="POST" enctype="multipart/form-data" style=float:right;margin-right:40px;>
			                                    <input type="text" name="save_id" value='. $uplode_id .' hidden>
			                                    <input type="text" name="image" value='. $row['image'] .' hidden>
			                                    <input type="text" name="video" value="" hidden>
		                                    	<input type="submit" name="save" value="save">
		                                   </form>';
		                }                  
		                if (!empty($row['video'])){
	                        $imgoutput_id = $row['uplode_id'];
			                 
		                    $vidoutput .= '<div> <video height= auto width=100%;  controls>
		                                  <source src=' .$row['video']. ' type=video/webm>
		                                  </video></div>
		                                  <form action="public.php" method="POST" enctype="multipart/form-data" style=float:right;margin-right:40px;>
			                                    <input type="text" name="save_id" value='. $uplode_id .' hidden>
			                                    <input type="text" name="image" value="" hidden>
			                                    <input type="text" name="video" value='. $row['video'] .' hidden>
			                                    <input type="submit" name="save" value="save">
	                                   	   </form>';
		                }      
		                if (!empty($row['text'])){
	                        $imgoutput_id = $row['uplode_id'];
			                 
		                    $text.=$row['text'];
		                }      

		                    $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$imgoutput_id}");
		                    if(mysqli_num_rows($sql2) > 0) {                
   		                    	$row = mysqli_fetch_assoc($sql2);
   			                    $output .= '<a href="userprofile.php?user_id='.$row['unique_id'].'">
	                                            <div class="content">
					                                <div class="details">
						                                <span>'. $row['fname'] ." ". $row['lname'] .'</span>
					                                </div>
				                                </div>
			                                    </a>';
   		                     }
   		                      $sql2 = mysqli_query($conn, "SELECT * FROM teachers WHERE unique_id = {$imgoutput_id}");
		                    if(mysqli_num_rows($sql2) > 0) {                
   		                    	$row = mysqli_fetch_assoc($sql2);
   			                    $output .= '<a href="userprofile.php?user_id='.$row['unique_id'].'">
	                                            <div class="content">
					                                <div class="details">
						                                <span>Proof : '. $row['fname'] ." ". $row['lname'] .'</span>
					                                </div>
				                                </div>
			                                    </a>';
   		                     }
   		                
		                echo $output;
		                echo $imgoutput;
		                echo $vidoutput; 
		                echo $text;
		                echo '<div style=padding-bottom:20px;></div>';
		                $output = "";
		                $imgoutput ="";
		                $vidoutput = "";
		                $text = "";
                	}
	            ?>

	

		</div>
			<div style="height: 45px; width: 100%;">
			
			<div style="float:right;height:45px;width:calc(50% + 20px);">
				<a href="image.php" style="float: left;">
	                <div style="width:40px;height: 40px;border-radius: 50%;margin-top: 3px; background: #ff0000;">	
	                </div>
	            </a>
	           
	                </div>
	            </a>
	           
	        </div>
		</div>
    </section>
</div>



</body>
</html>