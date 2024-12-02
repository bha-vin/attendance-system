<?php 
   include_once "configure.php";
   session_start();
   if (isset($_SESSION['unique_id'])) {
  
   }
 $uplode_id = $_SESSION['unique_id'];
 $_SESSION['unique_id']= $uplode_id;
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
 		
    	<div class="subject-search">
<div class="wrapper"><button style="float: right;margin-top: 5px;margin-right: 10px;font-size: 20px;background:#fff;border:0px;"><b>X</b></button>
	<section class="form signup">
 		<form action="teacherphp.php" method="POST">
 			<div class="field input">
 			<input type="text" name="teacher_id" value="<?php echo $uplode_id; ?>" hidden>
 			<input type="text" name="branch" placeholder="branch">
 			<input type="text" name="subject" placeholder="subject">
 			<input type="text" name="subject_code" placeholder="code">
 			</div>
 <div class="Add-subject"><input type="submit" name="submit" value="Add" style="padding: 5px 10px;">
 </div>
 </form>
</section>
</div>
</div>

    	<div class="branch_code">
<div class="wrapper"><button style="float: right;margin-top: 5px;margin-right: 10px;font-size: 20px;background:#fff;border:0px;"><b>X</b></button>
	<section class="form signup">
		<?php
 		 $sqle = "SELECT * FROM subject_teachers WHERE teacher_id = {$uplode_id} AND special = 'HOD'";
    $result = mysqli_query($conn,$sqle);
       if (mysqli_num_rows($result) > 0) {
                  $output = "";
	                while ($row = mysqli_fetch_array($result)) {
	                   	if ($row['special']=="HOD"){
			                
		                    $output .='<a href="hod.php?branch='.$row['branch'].'">
		                    <div style="height:100px; width:100px;border-radius:8px;background:#df7f00;text-align: center;padding-top: 40px;font-size: 19px;margin:10px;"><b>'. $row['branch'] .'</b></div></a><br>';
		                } 
		            }
		            echo $output;

                } 
 		?>
</section>
</div>
</div>
<div class="subject-icon">
     <?php

      include_once"configure.php";
	                $sqle = "SELECT * FROM subject_teachers WHERE teacher_id = {$uplode_id} ORDER By id DESC ";
                 	$result = mysqli_query($conn,$sqle);
	       
	                $output = "";
	                while ($row = mysqli_fetch_array($result)) {
	                   	if (!empty($row['Subject'])){
			                
		                    $output .='<a href="attendenceview.php?subject='.$row['Subject'].'">
		                    <div style="height:100px; width:100px;border-radius:8px;background:#df7f00;text-align: center;padding-top: 40px;font-size: 19px;margin:10px;"><b>'. $row['Subject'] .'</b></div></a><br>';
		                } 
		            }
		            echo $output;

     ?>
</div>
    </div>

 <div class="subject-btn" style="height: 40px; float: left;margin-top: 10px; margin-left:40%;"><button style="width: 100px;height: 40px;border-radius: 5px;">Add-subject</button>
 
 </div>
 
<?php  
    $sqle = "SELECT * FROM subject_teachers WHERE teacher_id = {$uplode_id} AND special = 'HOD'";
    $result = mysqli_query($conn,$sqle);
       if (mysqli_num_rows($result) > 0) {
                  $branch_code ="";
                  $branch_code .='<div class="branch-btn" style="float: right;height: 40px;margin-top: 10px;margin-right: 10px;"><button style="width: 100px;height: 40px;border-radius: 5px;">Branch_Code</button></div>';
                  echo $branch_code;

                }               	
?>

</div>
</div>
 </body>
 <script type="text/javascript">
 	const SubjectDiv = document.querySelector(".subject .subject-search"),
Subject_icon = document.querySelector(".subject .subject-icon"),
SubjectBtn = document.querySelector(".subject-btn button"),
AddSubBtn = document.querySelector(".subject-search .wrapper button"),
BranchDiv = document.querySelector(".subject .branch_code"),
AddBranchBtn = document.querySelector(".branch_code .wrapper button"),
BranchBtn = document.querySelector(".branch-btn button");


AddSubBtn.onclick = ()=>{
	Subject_icon.classList.remove("active");
	SubjectDiv.classList.remove("active");
}
SubjectBtn.onclick = ()=>{
	Subject_icon.classList.add("active");
	SubjectDiv.classList.add("active");
	BranchDiv.classList.remove("active");
	Subject_icon.classList.remove("bactive");
}
AddBranchBtn.onclick = ()=>{
	Subject_icon.classList.remove("bactive");
	BranchDiv.classList.remove("active");
}
BranchBtn.onclick = ()=>{
	Subject_icon.classList.add("bactive");
	BranchDiv.classList.add("active");
	SubjectDiv.classList.remove("active");
	Subject_icon.classList.remove("active");
}
 </script>
 </html>
 