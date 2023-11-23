<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewfavourite</title>
</head>
<body>
 <?php
 include'header.php';
 ?>   
    <div class="container">
        <div class="row">
           <div class="col-lg-12 text-center bg-light mb-5 rounded">
            <h1 >My Favourite</h1>
           </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-6 col-lg-10">
                <table class="table tble-bordered text-center">
                    <thead class= "bg-danger fs-5">
                        <th>S.N.</th>
                        <th>Dish Name</th>
                        <th>Recipe </th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                       $i = 0;
                        if(isset($_SESSION['favourite'])){
                            foreach($_SESSION['favourite'] as $key => $value){
                                $i =$key +1;
                                echo " 
                              <form action = 'insertfav.php' method = ' POST'> 
                              <tr>
                                <td>$i</td>
                                <td><input type = 'hidden' name = 'recipe_name' value = '$value[recipeName]'>$value[recipeName]</td>
                                <td><input type = 'hidden' name = 'recipe_text' value = '$value[recipeText]'>$value[recipeText]</td>
                                <td><button name = 'remove' class= 'btn-danger'>Delete</button></td>                                
                                <td><input type = 'hidden' name = 'item' value = '$value[recipeName]'></td>
                                </tr>
                                </form>
                                ";
                            
                            }
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</body>
</html>