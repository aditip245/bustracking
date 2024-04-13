<?php
session_start();
include('database.php');

    if (isset($_POST['email']) and isset($_POST['password'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
                $tquery = "SELECT * FROM `userdetails` WHERE email='$email' and password='$password'";

                $tresult = mysqli_query($conn, $tquery) or die(mysqli_error($conn));
                $trow = $tresult->fetch_array(MYSQLI_NUM);
                $tcount = mysqli_num_rows($tresult);

                //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
                if ($tcount == 1){
                    $_SESSION['id'] = $trow['0'];
                    $_SESSION['name'] = $trow['1'];

                    echo '<script language="javascript">';
                    echo "if(!alert('User Login Successfully !!')) document.location = 'view.php'";
                    echo '</script>';
                }
                else{
                    // If the login credentials doesn't match, he will be shown with an error message.
                    $tfmsg = "Invalid Login Credentials.";
                   

                    echo '<script language="javascript">';
                    echo "if(!alert('Invalid Login Credentials !!')) document.location = 'index.php'";
                    echo '</script>';


                }
    }
    //end


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
          
            
            <p>Welcome, Please Login</p>
            <form action="" class="m-t" role="form" method="post" >
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <!--<a href="" name="submit" class="btn btn-primary block full-width m-b">Login</a>-->
                <center><button class="btn btn-primary block full-width m-b" name="submit" type="submit">Submit</button></center> 
              
            </form>
           
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
