<?php 

 $id = $_GET['ID'];
$con = mysqli_connect('localhost','root','','wellplated');
mysqli_query($con , "DELETE FROM `tbluser` WHERE id = $id");
header("location:user.php");

?>