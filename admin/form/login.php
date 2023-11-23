<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body class="bg-secondary">
    
<div class="container">
            <div class="row">
                <div class="col-md-6 shadow m-auto  bg-white p-3 border border-primary mt-3">
                <form action="login1.php" method="POST">
          <div class="mb-3">
        <p class="text-center fw-bold fs-3 text-primary">Login</p>
          </div>

          
          <label class="form-label" >Email:</label>
          <input type="email" name="email" class="form-control" required placeholder="Enter email">

          
          <label class="form-label">Password:</label>
          <input type="password" name="password" class="form-control" required placeholder="Enter password">

          
          
          
         <button class="bg-info fs-4 fw-bold my-3 form-control text-white">Login</button>

          </form>
                </div>
            </div>
        </div>
</body>
</html>