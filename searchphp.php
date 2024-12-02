<html>
        <a href="exel.php"><div style="width:80px;height:30px;border-radius: 5px;background:#aaa;padding: 5px 15px;margin-bottom: 10px;color: #fff;">Export</div></a>
  </html>
<?php 
include_once "configure.php";
session_start();
$subject = $_SESSION['subject'];
 

   $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
   $output = "";
   $output1 = "";
     $sql = mysqli_query($conn, "SELECT * FROM attendance WHERE branch = '{$subject}' AND (date LIKE '%{$searchTerm}%' OR name LIKE '%{$searchTerm}%')");
   
         
                  $output = "<th>Date</th><th>Name</th>";
                  while ($row = mysqli_fetch_array($sql)) {
                      if (!empty($row['branch'])){
                      
                        $output .='<tr><td>'.$row['date'].'</td><td>'.$row['name'].'</td></tr>';
                    } 
                }
                $output1 .='<div><table border="10px;" width="480px;">'. $output .'</table></div>';
                echo $output1;

 $_SESSION['output1']= $output1;
 $_SESSION['searchTerm']= $searchTerm;
?>