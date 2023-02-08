<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location:dashbord.php");
}
if(isset($_POST["submit"])){
   $user = $_POST["user"];
   $pass = $_POST["pass"];
   $con=mysqli_connect("localhost","root","","curly2");
   $sql="SELECT * FROM users WHERE username='$user' AND password='$pass'";
   $res=mysqli_query($con,$sql);
   $rows=mysqli_num_rows($res);
//    mysqli_query($con,$sql);
//    mysqli_close($con);
   if($rows === 1){
    $_SESSION["user"]=$user;
    header("Location: dashboard.php");
   }
   $error = true;
   mysqli_close($con);
}
?>













<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>صفحة تسجيل الدخول </title> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body dir="rtl">
<div class="d-flex align-items-center min-vh-100 bg-dark">
     <div class="container d-flex justify-content-center">
<form method="post" class="bg-light px-5 py-4 rounded-1 col-md-6 col-lg-5 col-x1-4">
<h1 class="text-center mb-4">تسجيل الدخول</h1>
<div class="mb-3">
<label for="user" class="form-label">اسم المستخدم</label>
<input type="text" id="user" name="user" class="form-control" required>
</div>
<div class="mb-3">
<label for="pass" class="form-label"> كلمه المرور </label>
<input type="password" id="pass" name="pass" class="form-control" required>
</div>
<div class="mb-3">
<a href="register.php" style="font-size: 12px;" class="text-decoration-none">لييس لديك حساب ؟
</a>
</div>
<button type="submit" name="submit" class="btn btn-success w-75 d-block m-auto">تسجيل </button>
</form>
</div>
</div>









<div class="modal " id="modal1">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content bg-danger bg-gradient">
<div class="modal-header text-warning">
     <button class="btn btn-close" data-bs-dismiss="modal"></button>
      <h5 class="position-absolute mx-5 mt-2">لقد حدث خطأ</h5>
</div>
<div class="modal-body text-warning">
<h4 class="text-center p-3">فشل تسجيل الدخول حاول مره اخري</h4>
</div>
<div class="modal-footer">
<button class="btn btn-dark w-75 d-block m-auto" data-bs-dismiss="modal"> إغلاق</button>
</div>
</div>
</div>
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



<?php
   if(isset($error)){
    echo "
    <script>
    var x= document.getElementById('modal1');
    new bootstrap.Modal(x).show();
    </script>
    ";
   }
   ?> 



</body>
</html>