<?php
include('database.php');
session_start();

if (!isset($_SESSION['name'])) {
 echo '<script language="javascript">';
        echo "if(!alert('You should be logged in to access this page.')) document.location = 'index.php'";
        echo '</script>';
}

if (isset($_POST['submit']) && !isset($_GET['id'])) {
  $busstop=$_POST['busstop'];
  $ckaname= $_POST['ckaname'];
  $location= $_POST['location'];
  $pincode= $_POST['pincode'];

 $query = "INSERT INTO `busstop` (busstop, ckaname, location, pincode) VALUES ('$busstop', '$ckaname', '$location', '$pincode')";
    $result = mysqli_query($conn, $query);
    if($result){
       // $smsg = "Text Added Successfully.";
        echo '<script language="javascript">';
        echo "if(!alert('BusStop Added Successfully.')) document.location = 'busstop.php'";
        echo '</script>';
        
    }else{
         echo '<script language="javascript">';
        echo "if(!alert('BusStop Addition Failed.')) document.location = 'index.php'";
        echo '</script>';
    }

}



if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $query1="SELECT * FROM busstop WHERE id=$id";
    $res=mysqli_query($conn,$query1) or die(mysqli_error($conn));
    $data=$res->fetch_assoc();
}

if (isset($_POST['submit']) && isset($_GET['id'])) {

    $busstop=$_POST['busstop'];
  $ckaname= $_POST['ckaname'];
  $location= $_POST['location'];
  $pincode= $_POST['pincode'];

    $query = "UPDATE `busstop` set busstop='$busstop', ckaname='$ckaname', location='$location', pincode='$pincode' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        // $smsg = "Record Updated Successfully.";
        echo '<script language="javascript">';
        echo 'if(!alert("Bus Stop Updated Successfully")) document.location = "viewbusstop.php";';
        echo '</script>';


    }else{
        // $fmsg ="Record Updation Failed";
        echo '<script language="javascript">';
        echo 'if(!alert("Bus Stop Updation Failed")) document.location = "addbus.php";';
        echo '</script>';


    }
}
?><!DOCTYPE html>
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
                            <h3>Bus Stop</h3>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                      
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form action="#" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Bus Stop Name</label>

                                    <div class="col-sm-10"><input type="text" name="busstop" class="form-control" value="<?php if (isset($_GET['id'])){echo $data['busstop'];}else{echo '';}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                  <div class="form-group"><label class="col-sm-2 control-label">Commonly Known as</label>

                                    <div class="col-sm-10"><input type="text" name="ckaname" class="form-control" value="<?php if (isset($_GET['id'])){echo $data['ckaname'];}else{echo '';}?>"></div>
                                </div>

                                   <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label"> Location</label>

                                    <div class="col-sm-10"><input type="text" name="location" class="form-control" value="<?php if (isset($_GET['id'])){echo $data['location'];}else{echo '';}?>"></div>
                                </div>
                                 <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Pincode</label>

                                    <div class="col-sm-10"><input type="number" name="pincode" class="form-control" value="<?php if (isset($_GET['id'])){echo $data['pincode'];}else{echo '';}?>"></div>
                                </div>
                              
                            
                   
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                       <center><button class="btn btn-primary" type="submit" name="submit">Submit</button></center> 
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
