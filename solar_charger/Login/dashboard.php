<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location:index.php");
}
if(isset($_GET["logout"])){
    session_destroy();
    header("Location:index.php");
}

$user = $_SESSION["user"];


// session_start();
// if(isset($_SESSION["booking"])){ 
//     header("Location: dashboard.php");
// }
if(isset($_POST["submit"])){
$user = $_POST["user"];
$pass = $_POST["pass"];
$type = $_POST["type"];
$loc = $_POST["loc"];
$con = mysqli_connect("localhost", "root", "", "book");
 $sql = "INSERT INTO booking (name, email,location) VALUES ('$user', '$pass' ,'$loc')";
// mysqli_query($con, $sql);
// mysqli_close($con);
header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
     h1.wel {
        color: #fff;
     
     }

     body {
        text-align: center;
        padding: 100px;
     } 

     a {
        background-color: #fff;
        color: #000;
        text-decoration: none;
        display:inline-block;
        padding: 15px;
        width: 200px;
        text-decoration: none;
        font-family: arial;
        font-weight: bold;
        text-align: center
     }
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="max-vh-100 bg-dark">
<h1 class="wel"> Welcome <span><?php echo $user;?></span></h1> <br>
    <a href="?logout">  Logout </a>
    <div class="d-flex align-items-center max-vh-100 ">


   



     <div class="container d-flex justify-content-center">
<form method="post" class="bg-light px-5 py-4 rounded-1 col-md-6 col-lg-5 col-x1-4">
<h1 class="text-center mb-4">Book Ticket</h1>
<div class="mb-3">
<label for="user" class="form-label">Name</label>
<input type="text" id="user" name="user" class="form-control" required>
</div>
<div class="mb-3">
<label for="pass" class="form-label"> Email</label>
<input type="email" id="pass" name="pass" class="form-control" required>
</div>
<div class="mb-3">
<label for="pass" class="form-label"> Device Type</label>
<input type="text" id="type" name="type" class="form-control" required>
</div>
<div class="mb-3">
<label for="pass" class="form-label">Location</label>
<input type="text" id="loc" name="loc" class="form-control" required>
</div>
<!-- <div class="mb-3">
<a href="register.php" style="font-size: 12px;" class="text-decoration-none">don't have account? click here
</a>
</div> -->
<button type="submit" name="submit" class="btn btn-success w-75 d-block m-auto">Book</button>
</form>
</div>
</div>
<div class="modal " id="modal1">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content bg-danger bg-gradient">
<div class="modal-header text-warning">
     <button class="btn btn-close" data-bs-dismiss="modal"></button>
      <h5 class="position-absolute mx-5 mt-2">Information</h5>
</div>
<div class="modal-body text-warning">
<h4 class="text-center p-3">The ticket has been booked successfully </h4>
</div>
<div class="modal-footer">
<button class="btn btn-dark w-75 d-block m-auto" data-bs-dismiss="modal"> OK</button>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
  
    echo "
    <script>
    var x= document.getElementById('modal1');
    new bootstrap.Modal(x).show();
    </script>
    ";
   ?> 
    
    
</body>
</html>