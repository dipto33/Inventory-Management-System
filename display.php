<?php 
include 'header.php';
include 'connection.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="display2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Display</title>
</head>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <div class="container mt-5">
        
        <h1 class="text-center text-white bg-dark">Information of Medicine</h1>
        <br>
        <form method="post" action="">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            </form>
            <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center text-white bg-dark">
                             <th>Product Id</th>
                            <th>Medicine Name</th>
                            <th>Available Quantity</th>
                            <th>Price</th>
                            <th allign="left">Items Required</th>
                            <!--<th>Purchase</th>
                            <th>Test Result</th>
                <th>Date</th>-->
                        </thead>
                        <tbody>

                            <?php
    if(isset($_POST['search'])){
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `medicine_info` WHERE CONCAT(`name`, `id`, `quan`, `price`) LIKE '%".$valueToSearch."%'";
        $search_result = filterTable($query);
    }
    else {
        $query= "select * from `medicine_info`" ;
        $search_result = filterTable($query);
    }
    function filterTable($query){
        $querydisplay=  mysqli_query($connection,$query);
        return  $querydisplay;
    }
       //$row= mysqli_num_rows($search_result);

        ///add-to-card code
        ?>
          <form method="post" action="cart.php">
          <?php
    
    
    while( $res= mysqli_fetch_array($search_result)){
?>
                            <tr>
                                 <td class="text-center"><?php echo $res['id']; ?></td>
                                <td class="text-center"><?php echo $res['name']; ?></td>
                                <td class="text-center"><?php echo $res['quan']; ?></td>
                                <td class="text-center"><?php echo $res['price']; ?></td>
                                <!-- <td><input type="text" name="qnt" value="5"></td> -->
                                <td class="text-center"><input type="checkbox" name="check_list[]" value=<?php echo $res['id']; ?>>
                                <label>Select</label></td>
                            </tr>
                            


                            <?php
                        
}
       ?>
                        </tbody>

                    </table>
                    <input type="submit" name="submit" value="Submit" />
                
            </div>

            <?php

?>
        </form>
    </div>
</body>

</html>