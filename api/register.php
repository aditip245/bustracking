<?php
include('connect.php');
$response = array();

if (isset($_POST))
{
    $email=$_POST['email'];
    $password= md5($_POST['password']);
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $busnumber=$_POST['busnumber'];
    $type=$_POST['type'];

    if ($email && $password)
    {
        $squery = "SELECT * FROM `userdetails` WHERE email='$email'";
        $sresult = mysqli_query($conn, $squery) or die(mysqli_error($conn));
        $scnt = mysqli_num_rows($sresult);

        if ($scnt == 0)
        {

            $query = "INSERT INTO `userdetails` (name, email, phone, password, busnumber, type) VALUES ('$name', '$email', '$phone', '$password', '$busnumber', '$type')";
            $result = mysqli_query($conn, $query);
            if($result){
                $response['status'] = 'success';
                $response['message'] = 'User Registered Successfully';

            }else{
                $response['status'] = 'error';
                $response['message'] = 'User Registration Failed';
            }
        }
        else
        {
            $response['status'] = 'error';
            $response['message'] = 'User Already Exists';
        }


    }
    else
    {
        $response['status'] = 'error';
        $response['message'] = 'Fields Should Not Be Empty';
    }


    echo json_encode($response);
}
?>
