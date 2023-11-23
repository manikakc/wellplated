<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="conatiner">
        <div class="row">
            <div class="col-md-4 m-auto mt-5 bg-white shadow font-monospace border border-danger">

            <p class="text-danger text-center fs-3 fw-bold my-3">Login</p>
            <form action="login1.php" method="POST">
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class ="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter password" class ="form-control">
                </div>
                <div class="mb-3">
                   <button  class="w-100 bg-danger fs-4">Login</button>
                </div>
                <div class="mb-3">
                   <button name="submit" class="w-100 bg-danger fs-4"><a href ="register.php" class = "text-decoration-none text-dark">Sign up</a></button>
                </div>








            </form>
            </div>
        </div>
    </div>


</body>
</html>