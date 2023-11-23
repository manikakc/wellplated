<?php
   $con = mysqli_connect('localhost', 'root', '', 'wellplated');

   $admin_email = $_POST['email'];
   $admin_password = $_POST['password'];

   $result = mysqli_query($con, "SELECT * FROM `admin` WHERE email = '$admin_email' AND password = '$admin_password'");
    

   session_start();
   if (mysqli_num_rows($result)) {

      $_SESSION['admin'] =  $admin_email;
       echo "
       <script>
       alert('Login successfully');
       window.location.href='../home.php';
       </script>
       ";
   } else {
       echo "
       <script>
       alert('Invalid email/password');
       window.location.href='login.php';
       </script>
       ";
   }
?>
