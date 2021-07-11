<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user= $_POST['user'];
    $pass= $_POST['password'];
    if($user=="admin" && $pass=="admin")
    {
        //header("Location:admin.php");
        $_SESSION['username']= $user;
         header("Location:admin.php");
        //echo "Hello". $_SESSION['username'];
		//echo "<a href='logout.php'>Logout</a>";
    }
    else
    {

        //echo("error!!!!!!");
		require("login.php");
    }
	
}
else
	{
		//header('Location:index.php');
	}
?>
<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="loginn.css">
    <body>
    <div class="loginbox">
    <img src="images/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form action="" method="POST">
            <p>Username</p>
            <input type="text" name="user" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <br>
            <br>
            <input type="submit" name="submit" value="Login">
        </form>
        
    </div>

</body>
</head>
</html>