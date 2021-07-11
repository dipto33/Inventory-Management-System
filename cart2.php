<?php
    include 'header.php';
    include 'connection.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="display2.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
        <h1 class="text-center text-white bg-dark">Purchased Items</h1>
    <div class="table-responsive mt-5">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center text-white bg-dark">
                            <th>Serial No</th>
                            <th>Medicine Name</th>
                            <th>Subtotal</th>
                            <!--<th>Purchase</th>
                            <th>Test Result</th>
                <th>Date</th>-->
                        </thead>
                        <tbody>

                            <?php
                          
    
        $query1= "SELECT  * from tbl_product" ;
        $querydisplay=  mysqli_query($connection,$query1);
       //$row= mysqli_num_rows($search_result);

        ///add-to-card code
          $total=0;
    
    
    while( $res= mysqli_fetch_array($querydisplay)){
        $total+=$res['subtotal'];
?>
                            <tr>
                                <td class="text-center"><?php echo $res['SL.NO']; ?></td>
                                <td class="text-center"><?php echo $res['name']; ?></td>
                                <td class="text-center"><?php echo $res['subtotal']; ?></td>
                            </tr>
                            


                            <?php
                        
}

       ?>
                        </tbody>
                    
                    </table>
                    </div>
                    <form action="" method="post">
                   <div class="card" style="width: 18rem;">
  <div class="card-body text-white bg-primary">
    <h5 class="card-title">TOTAL:</h5>
    <h4 class="card-subtitle mb-2 text-white"><?php echo $total." Taka"; ?></h4>
    <p class="card-text">Thank you for buying.</p>
    <input type="submit" name="submit" value="BUY" />
    <input type="submit" name="submit2" value="BUY AGAIN" />
  </div>
</div>

                   
                    </form>
                     </div>
</body>
</html>
<?php
 
    if(isset($_POST['submit']))
    {
        $query2= "INSERT INTO `sell` ( `total`) VALUES ('$total')";
          $query_run=  mysqli_query($connection,$query2);
          ?>
           <script>
            swal("Congratulations!", "Please Come Again","success");
        </script>
     <?php    
    }
    if(isset($_POST['submit2']))
    {
    
       
         $query= "DELETE  from `tbl_product` ";
        $querydisplay=  mysqli_query($connection,$query);
        header('Location:display.php');
        
    }
?>