<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe-page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    include 'config.php';
    $Record = mysqli_query($con, "SELECT * FROM `tblrecipe` WHERE id = $id");
    $data = mysqli_fetch_array($Record);
} else {
    // Handle the case where 'ID' is not provided in the URL.
    echo "Recipe ID is not provided.";
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto border border-primary mt-3">
            <form action="update.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <p class="text-center fw-bold fs-3 text-primary">Recipe Product</p>
                </div>

                <label class="form-label">Dish Name:</label>
                <input type="text" value="<?php echo $data['recipe_name']?>" name="recipe_name" class="form-control" required>

                <div class="form-group">
                    <label class="form-label">Image:</label>
                    <input type="file" name="recipe_image" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <img src="<?php echo $data['recipe_image']; ?>" alt="" style="height: 100px">
                </div>

                <div class="form-group">
                    <label class="form-label">Recipe:</label>
                    <textarea name="recipe_text" rows="8" class="form-control"
                        required><?php echo isset($data['recipe_text']) ? $data['recipe_text'] : ''; ?></textarea>
                </div>

                <label class="form-label">Select Page</label>
                <select class="form-select" name="pages">
                    <option value="Home">Home</option>
                    <option value="Vegeterian">Vegeterian</option>
                    <option value="Chicken">Chicken</option>
                    <option value="Mutton">Mutton</option>
                    <option value="Drink">Drinks</option>
                   
                    
                </select>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <button name="update"
                    class="bg-info fs-4 fw-bold my-3 form-control text-white">Update</button>

            </form>
        </div>
    </div>
</div>

<!-- php update code  -->
<?php 
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $recipe_name = $_POST['recipe_name'];
    $recipe_category = $_POST['pages'];

    // Securely handle recipe_text using prepared statements
    $recipe_text = $_POST['recipe_text'];

    $image_name = $_FILES['recipe_image']['name'];
    $image_loc = $_FILES['recipe_image']['tmp_name'];
    $img_des = "Uploadimage/" . $image_name;

    // Move the uploaded image to a specified directory
    if (move_uploaded_file($image_loc, $img_des)) {
        // Image uploaded successfully.
        include 'config.php';
        $stmt = $con->prepare("UPDATE `tblrecipe` SET `recipe_name`=?, `recipe_image`=?, `recipe_text`=?, `rcategory`=? WHERE id = ?");
        $stmt->bind_param("ssssi", $recipe_name, $img_des, $recipe_text, $recipe_category, $id);
        if ($stmt->execute()) {
            header("location:submit_recipe.php");
        } else {
            echo "Update failed!";
        }
        $stmt->close();
    } else {
        // Error occurred while moving the image.
        echo "Image upload failed!";
    }
}
?>
</body>
</html>
