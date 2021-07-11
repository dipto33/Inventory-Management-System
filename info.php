 <?php
    include 'connection.php';
    if(isset($_POST['insert']))
    {
        $name= $_POST['name'];
        $pid= $_POST['product_id'];
        $quantity= $_POST['quantity'];
        $rate= $_POST['price'];
        //$address=$_POST['address'];
        //$bloodgroup=$_POST['blood_group'];
        //$image= $_FILES['imagefile'];
        //$result= $_POST['result'];
        //$date= $_POST['date'];


        //$filename= $image['name'];
        //print_r($filename);
        //$fileerror= $image['error'];
        //$filetemp= $image['tmp_name'];

        //$fileext = explode('.',$filename);
        //$filecheck = strtolower(end($fileext));

        //$fileextstored = array('png','jpg','jpeg');

        //if(in_array($filecheck,$fileextstored))
        //{
           // $destinationfile = 'upload/'.$filename;
            //move_uploaded_file($filetemp,$destinationfile);

       $query = "INSERT INTO `medicine_info` ( `name`, `id`, `quan`, `price`) VALUES ('$name','$pid','$quantity','$rate')";
       $query_run = mysqli_query($connection,$query);
       // header("Location:up.php");

   
 
        
   // }
}
     
    ?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="in.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
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
          <a class="nav-link active" href="#">Add Items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="infor">
        <div class="col-sm-5">
            <div class="form-data">
                <div class="form-head">
                    <h2 style="color: black">Add New Items</h2>
                </div>
                <div class="form-body">
                    <form action="info.php" method="POST" enctype="multipart/form-data">
                        <div class="row form-row">
                        <label>Medicine Name: </label>
                        <span>
                            <input type="text" name="name" placeholder="Enter Medicine Name" class="form-control">
                        </span>
                        </div>
                        <div class="row form-row">
                        <label>Product ID: </label>
                        <span>
                            <input type="text" name="product_id" placeholder="Enter Product ID Number" class="form-control">
                        </span>
                        </div>
                       <div class="row form-row">
                          <label>Quantity: </label>
                            <span>
                              <input type="text" name="quantity" placeholder="Enter Quantity" class="form-control">
                            </span>
                        </div>
                        <div class="row form-row">
                        <label>Price: </label>
                        <span>
                            <input type="text" name="price" placeholder="Enter Price(10 pics)" class="form-control">
                        </span>
                        </div>
                        <!--<div class="row form-row">
                            <label>Address: </label>
                            <span>
                                <input type="text" name="address" placeholder="Enter Your Address" class="form-control">
                            </span>
                        </div>
                        <div class="row form-row">
                            <label>Blood Group:</label>
                            <span>
                            <input type="text" name="blood_group" placeholder="Enter Your Blood Group" class="form-control">
                            </span>
                        </div>
                       <div class="row form-row">
                            <label>Date:</label>
                            <span>
                            <input type="text" name="date" placeholder="Enter Test Date" id="datepicker" class="form-control">
                            </span>
                        </div>

                        <input type="file" name="imagefile">-->

                       <!-- <label class="label2">Availability:</label>
                        <input type="radio" name="result" id="positive" value="positive">
                        <label class="label1" for="positive">In Stock</label><br>
                        <input type="radio" name="result" id="negative" value="negative">
                        <label class="label1" for="negative">Out of Stock</label>--><br>
                        <input type="submit" name="insert" value="SUBMIT">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--<script src="jquery-3.5.1.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $('#datepicker').datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true
            });
        })
    </script>-->
    <script>
    function show()
{
    document.getElementById('sidebar').classList.toggle('active');
}
</script>
</body>

</html>


