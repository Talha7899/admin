<?php
session_start();
if(isset($_SESSION['Email'])){
    header("Location:index.php");
}

?>

<?php
  include 'config.php';
  if(isset($_POST['login'])){
  
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    $query = "SELECT * FROM admin WHERE `email` = '$email'";
    $res = mysqli_query($connection,$query);
   if(mysqli_num_rows($res)> 0){
      while($row = mysqli_fetch_assoc($res)){
        $db_password = $row['password'];
        $pass_varify = password_verify($password,$db_password);
        if($pass_varify){
          session_start();
          $_SESSION['user'] = $row['username'];
          $_SESSION['Email'] = $row['email'];
          echo "<script> alert('Login Successful') 
          window.location.href = 'index.php'
          </script>";
  
        }else{
          echo "<script> alert('Invalid Email/Password') </script>";
  
        }
      }
   }else{
     echo "<script> alert('Invalid Email/Password') </script>";
   }
  
  
  
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/customstyle.css">
</head>

<body class="bg-gradient-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block  form-login-bg">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Now</h1>
                                    </div>
                                    <!-- Form Starts -->
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">
                                        </input>
                                    </form>

                                    <!-- Form End -->

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>