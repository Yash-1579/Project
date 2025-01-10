<?php
ob_start();
session_start();
require_once('../inc/db.php');

if (isset($_POST['submit'])){
        
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        
        $get_user = "SELECT * FROM users where user_name = '$username' AND user_pass = '$password'";
        $run_user = mysqli_query($con,$get_user);
        $check = mysqli_num_rows($run_user);
        
        if($check == 1){
             $_SESSION['user_name'] = $username;
             
            echo "<script>window.open('index.php','_self')</script>";
            
        }
        
                
        else {
            
            echo "<script>alert('Email Or Password is not correct !')</script>";
            
        }
        
        
        }

?>
<head>
    <title>Student Login Page</title>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,
        body {
            background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            height: 370px;
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .social_icon span {
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
        }

        .social_icon span:hover {
            color: white;
            cursor: pointer;
        }

        .card-header h3 {
            color: white;
        }

        .social_icon {
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #FFC312;
            color: black;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;

        }

        .remember {
            color: white;
        }

        .remember input {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn {
            color: black;
            background-color: #FFC312;
            width: 100px;
        }

        .login_btn:hover {
            color: black;
            background-color: white;
        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
        }
    </style>
</head>
<!DOCTYPE html>
<html lang="en">

 <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login | Teacher</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="bpp/bpp.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">


    <script src="js/jquery-1.11.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-2">
                <img src="images/techz.jpg" class="img-fluid shadow-light" width="100%">
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <hr>
                <form class="form-signin" action="" method="post">
                    <h2 class="text-secondary">Please sign in</h2>
                    <label class="sr-only">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required
                        autofocus><br>
                    <label class="sr-only">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="checkbox">
                        <label>
                            <?php
                if(isset($error)){
                    echo "$error";
                    
                }  
            ?>
                        </label>
                    </div>
                    <input type="submit" value="Sign In" name="submit" class="btn  btn btn-secondary btn-block">
                   
                </form>
                <br>
                <a href="../index.php">
                <input type="submit" value="Home"  class="btn  btn btn-secondary btn-block" ></a>
                
            </div>
            <div class="col-md-4"></div>
        </div>


        <div class="container-fluid mt-5">
            <div class="row bg-dark" style="padding-top:20px;">
                <?php include('inc/footer.php');?>
            </div>
        </div>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>