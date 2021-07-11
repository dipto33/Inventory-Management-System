<?php
    include 'connection.php';
    error_reporting(0);
    $pid=($_GET['mn']);
    $query= "DELETE FROM medicine_info WHERE `id` = '$pid'";
    $data= mysqli_query($connection,$query);

    if($data)
    {
       header("Location:up.php");
    }
    else
    {
        echo "Not";
    }
?>