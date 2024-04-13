<?php
include('connect.php');
$response = array();
$dataarr = array();

if (isset($_POST))
{
    $source = $_POST['source'];
    $destination = $_POST['destination'];

    $query1 = "SELECT * FROM busdetails";
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));

    while ($bdata = mysqli_fetch_assoc($result1))
    {
        $dstops = $bdata['stops'];
        $stops = explode(',',$dstops);

        $spos = array_search($source,$stops);
        $dpos = array_search($destination,$stops);

        if ($spos !== 'FALSE' && $dpos !== 'FALSE')
        {
            if ($spos < $dpos)
            {
                array_push($dataarr,$bdata);
            }
        }


    }

    $cnt = count($dataarr);

    if ($cnt != 0)
    {
        $response['data'] = $dataarr;
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
