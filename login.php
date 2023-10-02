<?php

session_start();  
if($_POST) {
  if( ($_POST['inputUsername']=== "NicoP") && ($_POST['inputPassword']=== "123asd")) { 
    $_SESSION['username'] = "NicoP";
    header("location:main.php");
  } else {
    echo "<script>alert('User or Password incorrect')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="login1.css">
  <title>Login</title>
</head>
<body>

<div class="container custom-container-main">
      <div class="row">
         <div class="col-md-4"> </div>
         <div class="col-md-4">
            <form method="post" action="login.php">
                 <div class="text-center custom-asd">
                   <label class="fs-3">Username:</label>
                   <br>
                   <input type="text" name="inputUsername" class="form-control">
                   <br>
                   <label class="fs-3">Password:</label>
                   <br>
                   <input type="password" name="inputPassword" class="form-control">
                   <br>
                   <input type="submit" value="Login" class="btn btn-success custom-btn">
                 </div>
            </form>
         </div>
         <div class="col-md-4"></div>
      </div>
</div>







  
</body>
</html>