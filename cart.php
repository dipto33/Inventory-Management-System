<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="display2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <script type="text/javascript" src="menu_1.0.17.js"></script>
 </head>

<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Medicine Shop</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Selling Product</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
        <br>
        <br>
        <h1 class="text-center text-white bg-dark">Information of Medicine</h1>

<div class="table-responsive">
    <form method="post" action="">
     <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center text-white bg-dark">
                            <th>Product Id</th>
                            <th>Medicine Name</th>
                            <th>Available Quantity</th>
                            <th>Items Required</th>
                            <!--<th>Purchase</th>
                            <th>Test Result</th>
                <th>Date</th>-->
                        </thead>
                          <tbody>

    <?php
    $data = array();
include 'connection.php';
if (isset($_POST['submit'])) {
    $data = $_POST['check_list'];
    if (!empty($_POST['check_list'])) {
    
        foreach ($_POST['check_list'] as $selected) {
            $sql = "SELECT * FROM medicine_info WHERE id=$selected";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                  $i=0;

                    ?>
                    <tr>
                    <td class="text-center"><?php echo  $row["name"]; ?></td>
                    <td class="text-center"><?php echo  $row["id"]; ?></td>
                    <td class="text-center"><input type ="hidden" class="iprice" value='40'"><?php echo  $row["price"]; ?></td>
                    <td class="text-center"><input class="text-center iquantity" onchange="subtotal()" type="number" name="quantity[]" value="1"></td>
                    <input type="hidden" name="id[]" value=<?php echo $row["id"]?>>
                    <input type="hidden" name="price[]" value=<?php echo $row["price"]?>>
                      <input type="hidden" name="name[]" value=<?php echo $row["name"]?>>
                    </tr>
        <?php 
echo '<br>';
                }
            } else {
                echo "0 results";
            }
        }?>

    </form>
    <?php

    }

}

?>
</tbody>
</table>
<input type="submit" name="buy" value="SUBMIT" />
</div>
</div>

</body>

</html>
<?php
 $connection= mysqli_connect("localhost","root","");
 $db = mysqli_select_db($connection,'cart');
if(isset($_POST['buy'])){
    if (!empty($_POST['quantity'])){
        for($i=0;$i<count($_POST['quantity']);$i++){
            $query = "UPDATE `medicine_info` SET `quan`= `quan` - {$_POST['quantity'][$i]} where `id`= {$_POST['id'][$i]}";
            $name =$_POST['name'][$i];
            $count =$_POST['quantity'][$i] * $_POST['price'][$i];
            $query3= "ALTER TABLE `tbl_product` AUTO_INCREMENT=1";
            $query_runnn = mysqli_query($connection,$query3);
            $query2 = "INSERT INTO `tbl_product` ( `name`, `subtotal`) VALUES ('$name','$count')";
            $query_run = mysqli_query($connection,$query); 
             $query_runn = mysqli_query($connection,$query2);
           
        }
        header("Location:cart2.php");
    }
}

?>