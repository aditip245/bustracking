<?php
session_start();
include('database.php');




if (isset($_POST['submit']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $email=$_POST['email'];
    $password= md5($_POST['password']);
    $name=$_POST['name'];
    $phone=$_POST['phone'];

    $query = "UPDATE userdetails SET email='$email', password='$password', name='$name', phone='$phone' WHERE id=$id";;
    $result = mysqli_query($conn, $query);
    if($result){
        echo '<script language="javascript">';
        echo "if(!alert('User Details Updated Successfully.')) document.location = 'view.php'";
        echo '</script>';

    }else{
        echo '<script language="javascript">';
        echo "if(!alert('User Details Updation Failed.')) document.location = 'register.php?id=".$id."'";
        echo '</script>';
    }

}

if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $squery = "SELECT * FROM `userdetails` WHERE id=$id";
    $sresult = mysqli_query($conn, $squery) or die(mysqli_error($conn));
    $sdata = mysqli_fetch_assoc($sresult);

}


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bus Tracking</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <?php include('header.php'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to Dashboard</span>
                    </li>


                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h3>Register</h3>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class="ibox-content">
                            <form action="#" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10"><input type="text" name="name" class="form-control" value="<?php if(isset($_GET['id'])){echo $sdata['name'];}else{echo '';}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10"><input type="email" name="email" class="form-control" value="<?php if(isset($_GET['id'])){echo $sdata['email'];}else{echo '';}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Password</label>

                                    <div class="col-sm-10"><input type="password" name="password" class="form-control" value="#####"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Contact Number</label>

                                    <div class="col-sm-10"><input type="number" name="phone" class="form-control" value="<?php if(isset($_GET['id'])){echo $sdata['phone'];}else{echo '';}?>"></div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <center><button class="btn btn-primary" name="submit" type="submit">Submit</button></center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>


</body>

</html>
