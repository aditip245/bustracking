<?php
include('connect.php');
$response = array();
$dataarr = array();


    $query1 = "SELECT * FROM busdetails";
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
    $cnt = mysqli_num_rows($result1);

    if ($cnt != 0)
    {
        while($data = $result1->fetch_assoc())
        {
            array_push($dataarr,$data);
        }

        $response['data'] = $dataarr;
        $response['status'] = 'success';
        $response['message'] = 'Data Found Successfully';
    }
    else
    {
        $response['data'] = '';
        $response['status'] = 'error';
        $response['message'] = 'Failed to get data';
    }


    echo json_encode($response);

?>
