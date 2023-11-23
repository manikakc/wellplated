<?php

$email = $_POST['email'];
$password = $_POST['password'];
$con = mysqli_connect('localhost', 'root', '', 'wellplated');

$result = mysqli_query($con , "SELECT * FROM `tbluser` WHERE email ='$email' AND (password = '$password')");
  
session_start();
if(mysqli_num_rows($result))
{
    $_SESSION['user'] = $email ;
    echo "
    <script>
    alert('Successfully Login');
    window.location.href ='../index.php';
    </script>
    ";
}
else{
    echo "
    <script>
    alert('Incorrect email/password');
    window.location.href ='login.php';
    </script>
    ";
}

?>

