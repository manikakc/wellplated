<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vegeterian</title>
    <?php
    include 'header.php';
    ?>

</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
             <div class="row">

       
    
 
<h1 class="text-dark font-monospace text-center my-2 ">Vegeterian</h1>
<?php
  include '../admin/recipe/config.php';
  $Record = mysqli_query($con, "SELECT * FROM tblrecipe");
    while($row = mysqli_fetch_array($Record))
    {
      $check_page = $row['rcategory'];
      if( $check_page =='Vegeterian'){

    
        echo "
        <div class='col-md-2 col-lg-6 m-auto mb-3 mt-2'>
        <form action= 'insertfav.php' method= 'POST'>
        <div class='card m-auto' style='width: 30rem;'>
        <img src='../admin/recipe/$row[recipe_image]' class='card-img-top' style='height: 300px; object-fit: cover;'>
      <div class='card-body text-center'>
    <h5 class='card-title fs-4 fw-bold'>$row[recipe_name]</h5>
    <p class='card-text fs-8 fw-bold'>$row[recipe_text]</p>

    <input type = 'hidden' name = 'recipe_name' value = '$row[recipe_name]' >
    <input type = 'hidden' name = 'recipe_text' value = '$row[recipe_text]' >
    <input type='submit'  name  = 'addfavourite' class = 'btn btn-danger text-dark w-100' value='Add To Favourite'>
    
  </div>
</div>
</form>
</div>
";
}
}
?>
</div>
</div>
</div>
    
</body>
</html>