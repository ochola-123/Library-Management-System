<?php
    include "connection.php";
    include "navbar.php";
    ?>




<!DOCTYPE html>
<html>
<head>

  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>
<!----
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">NHC ONLINE LIBRARY MANAGEMENT SYSTEM</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="admin_login.php">ADMIN</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

            <li><a href="member_login.php"><span class="glyphicon glyphicon-log-in"> MEMBER-LOGIN</span></a></li>
            <li><a href="member_login.php"><span class="glyphicon glyphicon-log-out"> MEMBER-LOGOUT</span></a></li>
            <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
          </ul>

      </div>
    </nav>
----->
<section>
  <div class="log_img">
   <br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> NHC Online Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">Admin Login Form</h1><br>
      <form  name="login" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color: orange;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        New to this website?<a style="color: orange;" href="registration.php">Sign Up</a>
      </p>
    </form>
    </div>
  </div>
</section>

<?php

if(isset($_POST['submit']))

{
    $count=0;
    $res=mysqli_query($db,"SELECT * FROM `admin`WHERE username='$_POST[username]' && password='$_POST[password]';");
    $row = mysqli_fetch_assoc($res);

    $count=mysqli_num_rows($res);

    if($count==0)
    {
        ?>
        <!----
            <script type="text/javascript">
                alert("The username and password doesn't match.")
            </script>
            ----->
            <div class="alert alert-warning" style="width: 700px; margin-left: 300px; background-color: #08c; color: white">

                <strong>The username and password doesn't match</strong>

            </div>



        <?php
    }
    else
    {
      /*--------if username & password matches---------*/
      $_SESSION['login_user'] = $_POST['username'];
      $_SESSION['pic']= $row['pic'];

        ?>
        
        <script type="text/javascript">
        window.location="index.php"
        </script>
        
      

        <?php
    }
}

?>




?>


<footer>

    <p style="color:white;text-align: center;margin-top: 150px;">
        <br><br>
        Email:&nbsp info@nhc.go.ke<br><br>
        Tel No:&nbsp +254 730 749000/ +254 759 93030

    </p>

</footer>

</body>
</html>