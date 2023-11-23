<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-home</title>
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">  
</head>

<?php
session_start();
if(!$_SESSION['admin'])
{
    header("location:form/login.php");
}

?>





<body>
           <nav class="navbar navbar-light bg-dark">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white">Wellplated</a>
    <span>
    <i class="fas fa-user-shield"></i>
    Hello,<?php echo $_SESSION['admin'];?>
    <i class="fas fa-sign-out-alt"></i>
    <a href="form/logout.php" class="text-decoration-none text-white">Logout</a>
    <a href="../user/index.php" class="text-decoration-none text-white">Userpanel</a>


    </span>
  </div>
       </nav>
            <div>
                <h2>Dashboard</h2>
            </div>

            
            <div class="col-md-6 bg-info text-center m-auto ">
                <a href="recipe/submit_recipe.php" class="text-decoration-none text-white fs-4 fw-bold px-5">Add Recipe</a>
                <a href="user.php" class="text-decoration-none text-white fs-4 fw-bold  px-5">Users</a>
            </div>


</body>
</html>