<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe-page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto border border-primary mt-3">
                <form action="insert_recipe.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
        <p class="text-center fw-bold fs-3 text-primary">Recipe Detail</p>
          </div>

          
          <label class="form-label" >Dish Name:</label>
          <input type="text" name="recipe_name" class="form-control" required>


          <label class="form-label">Image:</label>
          <input type="file" name="recipe_image"  class="form-control" accept="image/*>
         

          
          <label class="form-label">Recipe :</label>
          <textarea name="recipe_text" rows="8" class="form-control" required></textarea>


          
          
          <label class="form-label">Select Page</label>
          <select class="form-select" name="pages" >
        <option value="Home">Home</option>
        <option value="Vegeterian">Vegeterian</option>
        <option value="Chicken">Chicken</option>
        <option value="Mutton">Mutton</option>
        <option value="Drink">Drinks</option>
       


        </select>
         <button name="submit" class="bg-info fs-4 fw-bold my-3 form-control text-white">Submit</button>

          </form>
                </div>
            </div>
        </div>



        <!--fetch data-->

        <div class="container">
          <div class="row justify-content-around">
            <div class="col-md-10  m-auto">
              

<table class="table  border border-warning table-hover border my-4">
<thead class="bg-dark text-white fs-5  text-center">
<th>Id</th>
<th>Name</th>
<th>Image</th>
<th>Text</th>
<th>Category</th>
<th>Update</th>
<th>Delete</th>
</thead>





      <tbody class="text-center">
        <?php  
        include 'config.php';
        $Record = mysqli_query($con, "SELECT * FROM `tblrecipe`");

             while($row = mysqli_fetch_array($Record))
              

             echo"
             <tr>
             <td>$row[id]</td>
             <td>$row[recipe_name]</td>
             <td><img src= '$row[recipe_image]'height='90px' width ='200px'></td>
             <td>$row[recipe_text]</td>
             <td>$row[rcategory]</td>
             <td><a href='update.php? ID=$row[id]' class='btn btn-info'>Update</a></td>
             <td><a href='delete.php? ID=$row[id]' class='btn btn-info'>Delete</a></td>
             </tr>
             "


      
               ;
          
        
        ?>


      </tbody>
   



</table>

</div>
          </div>
        </div>

</body>
</html>