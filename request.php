<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Request</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
        .srch
            {
                padding-left: 850px;
                padding-top: 50px;
            }
        .form-control
        {
          width: 300px;
          height: 40px;
          background-color: black;
          color: white;
        }

body {
  background-image: url("images/registration.jpg");
  background-repeat: no-repeat;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: orange;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle 
{
    margin-left: 20px;
}
.h:hover 
{
    color: black;
    width: 300px;
    height: 50px;
    background-color: blue;
}
.container
{
    height: 600px;
    background-color: black;
    opacity: .8;
    color: white;
}

        </style>

</head>
<body>
<!----------------------------sidenav----------------------->


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

     <div style="color: white; margin-left: 60px; font-size: 20px;">
        <?php
        if(isset($_SESSION['login_user']))
         { 
            echo "<img class='img-circle profile_img' height=120 width=120 src='images/p.jpg'>";
            echo"</br></br>";
            echo "Welcome".$_SESSION['login_user'];
         }
         ?>
     </div><br><br>

  <div class="h" ><a href="books.php">Books</a></div>
  <div class="h" ><a href="request.php">Book requests</a></div>
  <div class="h" ><a href="issue_info.php">Issue Information</a></div>
  <div class="h"> <a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<br><br>
<div class="container">
    <div class="srch">
        <form method="post" action="" name="form1">
        <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
        <input type="text" name="book_id" class="form-control" placeholder="Book ID" required=""><br>
        <button class="btn btn-default" name="submit" type="submit">Submit</button><br>
        </form>
    </div>
    <h3 style="text-align: center;">Request of Books</h3>
    <?php
    if(isset($_SESSION['login_user']))
    {
        $sql=" SELECT member.username,id,books.book_id,title,category,author,`status` FROM member inner join issue_books ON member.username=issue_books.username inner join books ON issue_books.book_id=books.book_id WHERE issue_books.approve = ''";
        $res= mysqli_query($db,$sql);

        if(mysqli_num_rows($res)==0)
                {
                    echo"</br></br></br>";
                    echo"<h2><b>";
                    echo "There's no pending request";
                    echo"</b></h2>";
                }

                else
                {
                    echo "<table class='table table-bordered'>";
            echo "<tr style='background-color: #08C'>";
             //table header
            echo "<th>"; echo"Username"; echo "</th>";
            echo "<th>"; echo"Member ID"; echo "</th>";
            echo "<th>"; echo"Book ID"; echo "</th>";
            echo "<th>"; echo"Title"; echo "</th>";
            echo "<th>"; echo"Category"; echo "</th>";
            echo "<th>"; echo"Author"; echo "</th>";
            echo "<th>"; echo"Status"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";

                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['book_id']; echo "</td>";
                echo "<td>"; echo $row['title']; echo "</td>";
                echo "<td>"; echo $row['category']; echo "</td>";
                echo "<td>"; echo $row['author']; echo "</td>";
                echo "<td>"; echo $row['status']; echo "</td>";

                echo "</tr>";
            }

            echo "</table>";
                }
    }
    else
    {
        ?>
        <br>
            <h4 style="text-align: center; color: yellow;">You need to login to see the requests.</h4>
        <?php
    }
    if(isset($_POST['submit']))
    {
        $_SESSION['name']=$_POST['username'];
        $_SESSION['book_id']=$_POST['book_id'];

        ?>
                <script type="text/javascript">
                    window.location="approve.php"
                </script>

        <?php
    }
    /*
        if(isset($_SESSION['login_user']))
            {
                $q=mysqli_query($db,"SELECT * from issue_books WHERE username='$_SESSION[login_user]' ;");

                if(mysqli_num_rows($q)==0)
                {
                    echo"</br></br></br>";
                    echo"<h2><b>";
                    echo "There's no pending request";
                    echo"</b></h2>";
                }
                else
                {
                    echo "<table class='table table-bordered table-hover'>";
            echo "<tr style='background-color: #08C'>";
             
            echo "<th>"; echo"Book ID"; echo "</th>";
            echo "<th>"; echo"Approve"; echo "</th>";
            echo "<th>"; echo"Issue Date"; echo "</th>";
            echo "<th>"; echo"Return Date"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";

                echo "<td>"; echo $row['book_id']; echo "</td>";
                echo "<td>"; echo $row['approve']; echo "</td>";
                echo "<td>"; echo $row['issue']; echo "</td>";
                echo "<td>"; echo $row['return']; echo "</td>";

                echo "</tr>";
            }

            echo "</table>";
                }
            }
            else
            {
                echo"</br></br></br>";
                echo"<h2><b>";
                echo"Please login first to see the request information";
                echo"</b></h2>";
            }
            */
    ?>
</div>
</body>
</html>