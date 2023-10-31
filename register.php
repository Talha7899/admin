<?php
session_start();
if(isset($_SESSION['Email'])){
    header("Location:index.php");
}

?>

<?php
include("config.php");
if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
    $password_encrypt = password_hash($password, PASSWORD_BCRYPT);
    $cpassword_encrypt = password_hash($cpassword, PASSWORD_BCRYPT);
    
    $query = "SELECT * FROM `admin` WHERE `email` = '$email'";
    $result = mysqli_query($connection, $query) or die("Query Failed");
    if($password===$cpassword){
    if(mysqli_num_rows($result) > 0){
      echo "<script> alert('Email Already Exists') </script>";
    }else{
        $insert_query = "INSERT INTO `admin` (`username`, `email`, `password`, `cpassword`) VALUES ('$username', '$email', '$password_encrypt', '$cpassword_encrypt')";
        $result1 = mysqli_query($connection, $insert_query) or die("Insert Query Failed");
        if($result1){
          echo "<script> alert('Regestration Successful') 
          window.location.href = 'login.php'
          </script>";
        }
    }
    
    }else{
      echo "<script> alert('Password does not matched') </script>";
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

    <title>Register Page</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block form-reg-bg"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <!-- Form Starts -->

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="user">

                            <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Username" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" required autocomplete="off">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required autocomplete="off">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="cpassword" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required autocomplete="off">
                                    </div>
                                </div>
                                <input type="submit" name="register" value="Signup" class="btn btn-primary btn-user btn-block">
                                </input>
                                <hr>
                            </form>

                            <!-- Form End -->

                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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