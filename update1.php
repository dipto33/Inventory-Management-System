<?php

include 'connection.php';

    //$slno= $_POST['serial_no'];
    $name= $_POST['name'];
    $pid= $_POST['product_id'];
    $quantity= $_POST['quantity'];
    $rate= $_POST['price'];
    //$address= $_POST['address'];
    //$bloodgroup= $_POST['blood_group'];
    //$date= $_POST['date'];

    $query= "UPDATE `medicine_info` SET `name`='$name',`id`='$pid',`quan`='$quantity',`price`='$rate' WHERE `id`='$pid'";
    $data=mysqli_query($connection,$query);
    if($data)
    {
        echo"YES";
        header("Location:up.php");

    }
    else
    {
        echo"NO";
    }
 

?>


