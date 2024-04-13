<?php
include('connect.php');
$response = array();

if (isset($_POST))
{
    $id = $_POST['id'];
    $count = $_POST['count'];


    $query = "UPDATE `busdetails` set  count='$count' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if($result){

        $response['status'] = 'success';
        $response['message'] = 'Count Updated Successfully';

    }else{


        $response['status'] = 'error';
        $response['message'] = 'Failed to update count';

    }


    echo json_encode($response);
}
?>
