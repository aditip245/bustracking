<?php
session_start();
// connect to the database
include('database.php');

// confirm that the 'id' variable has been set
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
// get the 'id' variable from the URL
    $id = $_POST['id'];
    $page = $_POST['page'];

}


switch ($page) {
    case "register":
        $sql = "DELETE FROM userdetails WHERE id=$id";

        if ($conn->query($sql) === TRUE) {

            echo '<script language="javascript">';
            echo "if(confirm('Record Deleted Successfully')) document.location = 'view.php'";
            echo '</script>';

        } else {
            echo '<script language="javascript">';
            echo 'alert("Error deleting record: " '. $conn->error.')';
            echo '</script>';
        }
        break;
    case "viewbus":
        $sql = "DELETE FROM busdetails WHERE id=$id";

        if ($conn->query($sql) === TRUE) {

            echo '<script language="javascript">';
            echo "if(confirm('Record Deleted Successfully')) document.location = 'viewbus.php'";
            echo '</script>';

        } else {
            echo '<script language="javascript">';
            echo 'alert("Error deleting record: " '. $conn->error.')';
            echo '</script>';
        }
        break;
    case "busdetails":
        $sql = "DELETE FROM addbus WHERE id=$id";

        if ($conn->query($sql) === TRUE) {

            echo '<script language="javascript">';
            echo "if(confirm('Record Deleted Successfully')) document.location = 'viewbus.php'";
            echo '</script>';

        } else {
            echo '<script language="javascript">';
            echo 'alert("Error deleting record: " '. $conn->error.')';
            echo '</script>';
        }
        break;
    
    default:
        echo "No Data Found";
}
?>