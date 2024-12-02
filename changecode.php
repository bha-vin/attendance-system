<?php  
include "configure.php";
if (isset($_POST['submit-code'])) {
	$branch = $_POST['branch'];
	$newcode = $_POST['new-code'];




  $sql= " update permeation set code ='$newcode' where subject='{$branch}'";
	mysqli_query($conn,$sql);

$result= mysqli_query($conn,$sql);

if($result)
	{
	echo "Branch:";
	echo $branch;
	echo "!      Code:";
	echo $newcode;
	}
	else
	{
		echo"record not updated";
	}
	mysqli_close($conn);
}
?>
