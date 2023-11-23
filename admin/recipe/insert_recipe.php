<?php
if (isset($_POST['submit'])) {
    include 'config.php'; // Assuming 'config.php' contains your database connection code

    $recipe_name = $_POST['recipe_name'];
    $recipe_text = $_POST['recipe_text'];
    $recipe_category = $_POST['pages'];

    $image_name = $_FILES['recipe_image']['name'];
    $image_loc = $_FILES['recipe_image']['tmp_name'];
    $img_des = "Uploadimage/" . $image_name;

    // Move the uploaded image to a specified directory
    move_uploaded_file($image_loc, $img_des);

    // Use a prepared statement to insert data into the database
    $stmt = mysqli_prepare($con, "INSERT INTO `tblrecipe` (`recipe_name`, `recipe_image`, `recipe_text`, `rcategory`) VALUES (?, ?, ?, ?)");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $recipe_name, $img_des, $recipe_text, $recipe_category);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Recipe added successfully
            $_SESSION['status'] = "Recipe added successfully.";
            header('Location: submit_recipe.php');
        } else {
            // Error adding recipe
            $_SESSION['status'] = "Error adding recipe: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Error preparing the SQL statement
        $_SESSION['status'] = "Error preparing the SQL statement: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>




