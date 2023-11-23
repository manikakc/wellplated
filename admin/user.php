<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <?php 
    include('home.php');
     $con = mysqli_connect('localhost','root','','wellplated');
     $Record = mysqli_query($con , "SELECT * FROM `tbluser` WHERE 1")
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 text-center mx-5 ">
    <table class="table table-info table-bordered">
      <thead class="text-center">
        <th>S.N.</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Delete</th>

        
      </thead>  
      <tbody class="text-center "></tbody>
      <?php
      while ($row = mysqli_fetch_array($Record)) {
    echo "
    <tr>
        <td>$row[id]</td>
        <td>{$row['firstname']}</td>
        <td>{$row['lastname']}</td>
        <td>{$row['email']}</td>
        <td><a href='delete.php? ID=$row[id]' class='btn btn-outline-info info'>Delete</a></td>
    </tr>
    ";
  
}
?>

      </tbody> 
    </table>
    <div>
    </div>
    </div>
    </div>
    </div>


</body>
</html>