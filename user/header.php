<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">  
</head>
<body>

<?php  
session_start();
$count = 0 ;
if(isset($_SESSION['favourite']))
{
  $count = count($_SESSION['favourite']);
}
?>
         <nav class="navbar navbar-light bg-light">
       <div class="container-fluid font-monospace">
       <div style="display: flex; align-items: center;">
    <a class="navbar-brand" style="margin-right: 10px;"><img src="logo.jpg" alt="" style="width: 50px; height: auto;"></a>
    <h1 style="margin: 0;">Wellplated</h1>
</div>

      
       <div class="d-flex">
       <a href="index.php" class ="text-dark text-decoration-none pe-2"><i class="fas fa-home"></i>Home</a>
       <a href="viewfav.php" class ="text-dark text-decoration-none pe-2"><i class="fa-solid fa-heart"></i>Favourite(<?php echo $count?>)  |</a>
       
       <span class="text-dark pe-2">
       <i class="fa-solid fa-user"></i>
       <?php
       if(isset($_SESSION['user'])){
       echo $_SESSION['user'] ;
       echo "
       <a href='form/logout.php' class ='text-dark text-decoration-none pe-2'><i class='fa-solid fa-right-to-bracket'></i>Logout</a>
       ";
       }else{
        echo "
        <a href='form/login.php' class ='text-dark text-decoration-none pe-2'><i class='fa-solid fa-right-to-bracket'></i>Login</a>
        ";


       }
        ?>
        <a href="../admin/home.php" class ="text-dark text-decoration-none pe-2">Admin</a>
         



       </span>     
 
       </nav>
   </div>
   <div class="bg-danger font-monospace">
    <ul class="list-unstyled d-flex justify-content-center">
        <li><a href="Vegeterian.php" class="text-decoration-none text-dark fw-bold fs-4 px-5">VEGETERIAN</a></li>
        <li><a href="Chicken.php" class="text-decoration-none text-dark fw-bold fs-4 px-5">CHICKEN</a></li>
        <li><a href="Mutton.php" class="text-decoration-none text-dark fw-bold fs-4 px-5">MUTTON</a></li>
        <li><a href="Drink.php" class="text-decoration-none text-dark fw-bold fs-4 px-5">DRINKS</a></li>
       
    
    
    </ul>
  
   




   </div>


    </body>
    </html>