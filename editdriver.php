<?php
include('database.php');
session_start();

//if (!isset($_SESSION['name'])) {
//    echo '<script language="javascript">';
//    echo "if(!alert('You should be logged in to access this page.')) document.location = 'index.php'";
//    echo '</script>';
//}

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $query1="SELECT * FROM userdetails WHERE id=$id";
    $res=mysqli_query($conn,$query1) or die(mysqli_error($conn));
    $data=$res->fetch_assoc();
}

if (isset($_POST['submit']) && isset($_GET['id'])) {


    $id= $_GET['id'];
    $name=$_POST['dname'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $busno= $_POST['busno'];

    if ($_POST['password'] == '')
    {
        $password = $data['password'];
    }
    else
    {
        $password = md5($_POST['password']);
    }


    $query = "UPDATE `userdetails` set  name='$name', phone='$phone', email='$email', password='$password', busnumber='$busno' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        // $smsg = "Record Updated Successfully.";
        echo '<script language="javascript">';
        echo 'if(!alert("Driver Info Updated Successfully")) document.location = "userdetails.php";';
        echo '</script>';


    }else{
        // $fmsg ="Record Updation Failed";
        echo '<script language="javascript">';
        echo 'if(!alert("Driver Info Updation Failed")) document.location = "editdriver.php?id='.$id.'";';
        echo '</script>';


    }
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
                            <h3>Edit Driver</h3>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class="ibox-content">
                            <form action="#" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-4 control-label">Name</label>

                                    <div class="col-sm-8"><input type="text" name="dname" class="form-control" value="<?php if (isset($_GET['id'])){echo $data['name'];}else{echo '';}?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-4 control-label">Bus Number</label>

                                    <div class="col-sm-8"><input type="text" name="busno" class="form-control" value="<?php if (isset($_GET['id'])){echo $data['busnumber'];}else{echo '';}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-4 control-label">Phone</label>

                                    <div class="col-sm-8"><input type="text" name="phone" class="form-control" value="<?php if (isset($_GET['id'])){echo $data['phone'];}else{echo '';}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-4 control-label">Email</label>

                                    <div class="col-sm-8"><input type="email" name="email" class="form-control" value="<?php if (isset($_GET['id'])){echo $data['email'];}else{echo '';}?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-4 control-label">Password(Enter Only If Password is to be changed)</label>

                                    <div class="col-sm-8"><input type="text" name="password" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <center><button class="btn btn-primary" type="submit" name="submit"> Submit</button></center>
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

<!-- iCheck -->


</body>

</html>
