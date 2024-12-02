<?php 
session_start();
$output1 = $_SESSION['output1'];
$searchTerm = $_SESSION['searchTerm'];

header('Content-Type:application/vnd.ms-excel');
header("Content-Disposition:attachment; filename=$searchTerm.xls");
echo $output1;
?>