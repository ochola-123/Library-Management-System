SELECT FIRST, last, username, id, email, contact FROM `member`

<?php
    include "connection.php";
    include "navbar.php";
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Member Information</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
        .srch
            {
                padding-left: 850px;

            }
            body {
  font-family: "Lato", sans-serif;
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
     </div>


  <a href="request.php">Book requests</a>
  <a href="issue_info.php">Issue Information</a>
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

    <!--------------------------search bar--------------->
    <div class="container">
                    <div>

                        <form class="navbar-form" method="post" name="form1">
                        <div class="srch">
                        <input class="form-control" type="text" name="search" placeholder="member username..." required="">
                        <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                        </div>
                        </button>
                        <form>


                    </div>



        <h2>List Of Members</h2>
        <?php


            if(isset($_POST['submit']))
            {
                $q=mysqli_query($db,"SELECT `first`, `last`, username, id, email, contact FROM `member` WHERE username like '%$_POST[search]%'");

                if(mysqli_num_rows($q)==0)
                {
                    echo "Sorry! No member found with that useername. Try searching again.";
                }
                else
                {
                    echo "<table class='table table-bordered table-hover'>";
            echo "<tr style='background-color: #08C'>";
             //table header
            echo "<th>"; echo"First Name"; echo "</th>";
            echo "<th>"; echo"Last Name"; echo "</th>";
            echo "<th>"; echo"Username"; echo "</th>";
            echo "<th>"; echo"ID"; echo "</th>";
            echo "<th>"; echo"Email"; echo "</th>";
            echo "<th>"; echo"Contact"; echo "</th>";
            

            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";

                echo "<td>"; echo $row['first']; echo "</td>";
                echo "<td>"; echo $row['last']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['contact']; echo "</td>";

                echo "</tr>";
            }

            echo "</table>";
                }
            }
                /*--if button is not pressed.*/
                else
                {
                    $res=mysqli_query($db,"SELECT `FIRST`, `last`, username, id, email, contact FROM `member`  
            ");

            echo "<table class='table table-bordered table-hover'>";
            echo "<tr style='background-color: #08C'>";
             //Table header
             echo "<th>"; echo"First Name"; echo "</th>";
             echo "<th>"; echo"Last Name"; echo "</th>";
             echo "<th>"; echo"Username"; echo "</th>";
             echo "<th>"; echo"ID"; echo "</th>";
             echo "<th>"; echo"Email"; echo "</th>";
             echo "<th>"; echo"Contact"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";

                echo "<td>"; echo $row['FIRST']; echo "</td>";
                echo "<td>"; echo $row['last']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['contact']; echo "</td>";
                

                echo "</tr>";
            }

            echo "</table>"; 
                }






            /*----
            $res=mysqli_query($db,"SELECT * FROM `books`  
            ORDER BY `books`.`title` ASC;");

            echo "<table class='table table-bordered table-hover'>";
            echo "<tr style='background-color: #08C'>";
             
            echo "<th>"; echo"Book ID"; echo "</th>";
            echo "<th>"; echo"Title"; echo "</th>";
            echo "<th>"; echo"Category"; echo "</th>";
            echo "<th>"; echo"Author"; echo "</th>";
            echo "<th>"; echo"Book Copies"; echo "</th>";
            echo "<th>"; echo"Publisher"; echo "</th>";
            echo "<th>"; echo"ISBN"; echo "</th>";
            echo "<th>"; echo"Copyright Year"; echo "</th>";
            echo "<th>"; echo"Status"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";

                echo "<td>"; echo $row['book_id']; echo "</td>";
                echo "<td>"; echo $row['title']; echo "</td>";
                echo "<td>"; echo $row['category']; echo "</td>";
                echo "<td>"; echo $row['author']; echo "</td>";
                echo "<td>"; echo $row['book_copies']; echo "</td>";
                echo "<td>"; echo $row['publisher']; echo "</td>";
                echo "<td>"; echo $row['isbn']; echo "</td>";
                echo "<td>"; echo $row['copyright_year']; echo "</td>";
                echo "<td>"; echo $row['status']; echo "</td>";

                echo "</tr>";
            }

            echo "</table>";*/




        ?>
        </div>
    </body>
    
    
    </html>