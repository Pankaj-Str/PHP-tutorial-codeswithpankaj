<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
    <?php 
        include("nav.php");
    ?>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
                <div class="col-sm-6">

             <form action="login.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
        </div>
    </div>


</body>
</html>