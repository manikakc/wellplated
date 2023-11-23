<?php
session_start();
if(isset($_SESSION['user'])){

// Initialize the 'favourite' session array if it doesn't exist
if (!isset($_SESSION['favourite'])) {
    $_SESSION['favourite'] = array();
}

// Handle adding a new recipe
if (isset($_POST['addfavourite'])) {
    $recipe_name = $_POST['recipe_name'];
    $recipe_text = $_POST['recipe_text'];

    // Check if recipe_name and recipe_text are not empty
    if (!empty($recipe_name) && !empty($recipe_text)) {
        // Check if the recipe is already in the favorites
        $check_recipe = array_column($_SESSION['favourite'], 'recipeName');

        if (in_array($recipe_name, $check_recipe)) {
            echo "
            <script>
                alert('Product already added');
                window.location.href = 'index.php';
            </script>
            ";
        } else {
            // Add the new recipe to favorites
            $_SESSION['favourite'][] = array('recipeName' => $recipe_name, 'recipeText' => $recipe_text);
            header("location:viewfav.php");
        }
    } else {
        echo "
        <script>
            alert('Please provide a valid recipe name and text');
            window.location.href = 'index.php';
        </script>
        ";
    }
}

if (isset($_GET['remove']) && isset($_GET['item']) && !empty($_GET['item'])) {
    $itemToRemove = $_GET['item'];

    // Use array_filter to keep only the recipes that shouldn't be removed
    $_SESSION['favourite'] = array_filter($_SESSION['favourite'], function ($value) use ($itemToRemove) {
        return $value['recipeName'] !== $itemToRemove;
    });

    // Reindex the array to remove gaps in the keys
    $_SESSION['favourite'] = array_values($_SESSION['favourite']);

    // Redirect back to the 'viewfav.php' page
    header('location:viewfav.php');
}
}
else
{
    header("location:form/login.php");
}
?>
