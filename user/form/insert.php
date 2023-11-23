<?php
// Establish a database connection
$con = mysqli_connect('localhost', 'root', '', 'wellplated');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Sanitize and validate the user input
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check for duplicate email
    $duplicateCheck = mysqli_query($con, "SELECT * FROM `tbluser` WHERE email = '$email'");
    
    if (mysqli_num_rows($duplicateCheck) > 0) {
        // Display an alert message and redirect to the registration page
        echo "
            <script>
            alert('This Email is already taken. Please choose another email.');
            window.location.href = 'register.php';
            </script>
        ";
    } else {
        // Insert the new user into the database
        $query = "INSERT INTO `tbluser`(`firstname`, `lastname`, `email`, `password`) VALUES ('$firstname', '$lastname', '$email', '$password')";
        
        if (mysqli_query($con, $query)) {
            echo "
            <script>
            alert('Registered successfully');
            window.location.href ='login.php';
            </script>
            ";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    }
}
?>
