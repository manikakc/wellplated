<?php 
 $id = $_GET['ID']; 
include 'config.php';
mysqli_query($con, "DELETE FROM `tblrecipe` WHERE id = $id ");
header("location:submit_recipe.php");


?>