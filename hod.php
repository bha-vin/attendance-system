
<?php  
session_start();

 $uplode_id = $_SESSION['unique_id'];
include "configure.php";

 $branch = mysqli_real_escape_string($conn, $_GET['branch']);

    $sqle = "SELECT * FROM permeation WHERE subject='{$branch}'";
    $result = mysqli_query($conn,$sqle);

       if (mysqli_num_rows($result) > 0) {
       	$row = mysqli_fetch_array($result);
                  $output = "";
	               $output .='<input type="" name="" value="Privious-code : '.$row['code'].'">';
		            echo $output;
		            
                }               	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="changecode.php" method="POST" style="background: #bbb; width: 300px;margin-top: 20px;">
		<input type="text" name="branch" value="<?php echo $row['subject']; ?>" style="margin: 10px;" hidden><br>
		<input type="text" name="new-code" style="margin: 10px;"><br>
		<input type="submit" name="submit-code" value="chance-code" style="margin: 10px;">
	</form>
</body>
</html>