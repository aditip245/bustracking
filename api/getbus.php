<?php
include('connect.php');
$response = array();

if (isset($_POST))
{
    $id = $_POST['id'];

    $query1 = "SELECT * FROM busdetails WHERE id='$id'";
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
    $cnt = mysqli_num_rows($result1);
    $bdata = mysqli_fetch_assoc($result1);

    if ($cnt != 0)
    {
        $response['data'] = $bdata;
        $response['status'] = 'success';
        $response['message'] = 'Bus Found Successfully';
    }
    else
    {
        $response['data'] = '';
        $response['status'] = 'error';
        $response['message'] = 'Bus Not Available';
    }

}
else
{
    $response['data'] = '';
    $response['status'] = 'error';
    $response['message'] = 'Error Hitting API';
}

echo json_encode($response);

?>
