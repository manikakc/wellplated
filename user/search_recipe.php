<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <?php include 'header.php'; ?>
    <!-- search box -->
    <div class="row search-bar margin-top30 margin-bottom20">
        <div class="col-md-4 col-md-offset-4">
            <form class="d-flex" action="search_recipe.php" method="GET">
                <input class="form-control me-2" type="search" 
                    placeholder="Search dishes" aria-label="Search" name="search_data">
                <input type="submit" value="search" class="btn btn-danger" name="search_data_recipe">
            </form>
        </div>
    </div>
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <h1 class="text-dark font-monospace text-center my-2 ">Enjoy your meal!</h1>
                <?php
                    include '../admin/recipe/config.php';

                    // Searching recipe function
                    function search_recipe() {
                        global $con;
                        if (isset($_GET['search_data_recipe'])) {
                            $search_data_value = $_GET['search_data'];
                            $search_query = "SELECT * FROM `tblrecipe` WHERE recipe_name LIKE '%$search_data_value%'";
                            $Record = mysqli_query($con, $search_query);
                            while ($row = mysqli_fetch_array($Record)) {
                             
                                echo "
                                    <div class='col-md-2 col-lg-6 m-auto mb-3 mt-2'>
                                        <form action='insertfav.php' method='POST'>
                                            <div class='card m-auto' style='width: 30rem;'>
                                                <img src='../admin/recipe/$row[recipe_image]' class='card-img-top' style='height: 300px; object-fit: cover;'>
                                                <div class='card-body text-center'>
                                                    <h5 class='card-title fs-4 fw-bold'>$row[recipe_name]</h5>
                                                    <p class='card-text fs-8 fw-bold'>$row[recipe_text]</p>
                                                    <input type='hidden' name='recipe_name' value='$row[recipe_name]'>
                                                    <input type='hidden' name='recipe_text' value='$row[recipe_text]'>
                                                    <input type='submit' name='addfavourite' class='btn btn-danger text-dark w-100' value='Add To Favourite'>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                ";
                            }
                        }
                    }

                    // Call the search function
                    search_recipe();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
