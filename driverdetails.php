<?php
include ('database.php');
session_start();

//if (!isset($_SESSION['name'])) {
// echo '<script language="javascript">';
//        echo "if(!alert('You should be logged in to access this page.')) document.location = 'index.php'";
//        echo '</script>';
//}
$query="SELECT * FROM `driverdetails`";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bus Tracking</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
                            <h3>View Users</h3>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                                <thead>
                                <tr>

                                    <th data-toggle="true">ID</th>
                                    <th>Driver Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Bus Number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                while($result1=$result->fetch_assoc()){
                                ?>
                                <tr class="tablerow<?php echo $result1['id'];?>">

                                    <td><?php echo $result1['id']; ?></td>
                                    <td><?php echo $result1['name']; ?></td>
                                    <td><?php echo $result1['email']; ?></td>
                                    <td><?php echo $result1['phone']; ?></td>
                                    <td><?php echo $result1['busnumber']; ?></td>
                                    <td><?php echo '<a href="editdriver.php?id='.$result1['id'].'"><button type="button" class="btn btn-outline btn-warning">Edit</button></a>';?>&nbsp;<?php echo '<a class="delete" id='.$result1['id'].'><button type="button" class="btn btn-outline btn-danger">Delete</button></a>';?></td>

                                    <?php
                                    }

                                    ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

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

<!-- FooTable -->
<script src="js/plugins/footable/footable.all.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {

        $('.footable').footable();
        $('.footable2').footable();

    });

</script>
<script type="text/javascript">
    function confirmationEdit(anchor)
    {
        var conf = confirm('Are You Sure Want To Edit This Record?');
        if(conf)
            window.location=anchor.attr("href");
    }

    $(document).ready(function() {
        $('.delete').click(function() {
            var id = $(this).attr("id");
            if (confirm("Are You Sure Want To Delete This Record?")) {
                $.ajax({
                    type: "POST",
                    url: "masterdelete.php",
                    data: 'id='+id+'&page=busstop',
                    cache: false,
                    success: function(html) {
                        $(".tablerow" + id).fadeOut('slow');
                        alert("Record Succesfully Deleted !!");
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>

</body>

</html>
