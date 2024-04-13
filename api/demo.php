<?php
include('connect.php');
$response = array();
$oparray = array();
$oparr = array();

if (isset($_POST))
{
    $busstop = $_POST['busstop'];

    $query1 = "SELECT * FROM addbus where busstop='$busstop'";
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));



    if($result1){

        while($data = $result1->fetch_assoc())
        {
            $response[] = $data;
            $oparray['data'] = $response;
            $oparray['status'] = 'success';
            $oparray['message'] = 'Bus Data Found';

        }

    }

    else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to get data';
    }


    echo json_encode($oparray);
}
?>
